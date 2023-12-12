<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use App\RoleUser;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use App\Permission;
use App\PermissionRole;
use App\Role;
use App\Module;
use Illuminate\Support\Str;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-role')) {
           if ($request->ajax()) {
               $role = Role::with([
                   'permission_role' => function ($sql) {
                       $sql->with('permission');
                   }
               ]);
               return DataTables::of($role)
               ->addColumn('action', function ($model) {
                   return view('datatables._action-role', [
                       'model'=> $model,
                       'edit_url' => route('role.edit', $model->id),
                       'delete_url' => route('role.destroy', $model->id),
                       'can_edit' => 'edit-role'
                   ]);
               })
               ->editColumn('permission_role', function ($role) {
                   $permisson_name = '';
                   foreach ($role->permission_role as $row) {
                       $permisson_name .= ' ' . '<span class="badge badge-secondary">' .
                       $row->permission->display_name . '</span>';
                   }
                   return  $permisson_name;
               })
               ->rawColumns(['permission_role', 'action'])
               ->make(true);
           }
           return view('role.index');
        } else {
           return view('error.403');
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasPermission('create-role')) {
            # code...
            return view('role.create');
        } else {
            # code...
            return view('error.403');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasPermission('create-role')) {
             $validatedData = $request->validate([
                'name' => 'required',
                // 'email' => 'required|unique:users',
                // 'display_name' => 'required',
                // 'description' =>  'required',
            ]); 
             $data = new Role;
             $data->name = Str::slug($request->name);
             $data->display_name = $request->display_name;
             $data->description = $request->description;
             $data->save();

             return redirect()->route('role.index')->with('success', 'Added new Role');
        } else {
           # code...
           return view('error.403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermission('edit-role')) {
           $module = Module::with([
               'permission'
           ])
               ->whereHas('permission')
               ->get();
           $role = Role::find($id);
           return view('role.edit', compact('module', 'role'));
       } else {
           # code...
           return redirect()->route('error.403');
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if (Auth::user()->hasPermission('edit-role')) {
        $module = Role::find($id);
        $module->name = $request->name;
        $module->display_name = $request->display_name;
        $module->description = $request->description;
        $module->save();

        return redirect()->back()->with('success','Update Role successfully');
      } else {
        # code...
        return redirect()->route('error.403');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasPermission('delete-role')) {
             $deleteRole = Role::find($id);
             $deleteRole->delete();

             return response()->json([
               'msg'=>true
             ]);
        } else {
            return redirect()->route('error.403');
        }

    }
}
