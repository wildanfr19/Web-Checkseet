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
use App\Module;
use App\Role;
use Illuminate\Support\Str;
class PermissionController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
      if (Auth::user()->hasPermission('manage-permission')) {
        if ($request->ajax()) {
            $data = Permission::query()
            ->leftJoin('modules','permissions.module_id','=','modules.id')
            ->select(DB::raw('modules.name as "name_module"'),'permissions.id', 'permissions.display_name','permissions.description','permissions.name')
            ->get();
            return DataTables::of($data)
              ->addColumn('action', function ($model) {
                  return view('datatables._action-permission', [
                      'model'   => $model,
                      'edit_url'=> route('permission.edit', $model->id),
                      'delete_url'=> route('permission.destroy', $model->id),
                  ]);
              })
            ->editColumn('name', function($data){
              return '<span class="badge badge-secondary">' .
                       $data->name . '</span>';
            })
            ->rawColumns(['action','name'])
            ->make(true);
        }
        return view('permissions.index');
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
   if (Auth::user()->hasPermission('create-permission')) {
        return view('permissions.create');
    } else {
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

    if (Auth::user()->hasPermission('create-permission')) {
         $validatedData = $request->validate([
              'name' => 'required',
      // 'email' => 'required|unique:users',
              'display_name' => 'required',
              'description' =>  'required',
              'module_id' => 'required'
          ]);
          $data = new Permission;
          $data->name = Str::slug($request->name);
          $data->display_name = $request->display_name;
          $data->description = $request->description;
          $data->module_id = $request->module_id;
          $data->save();
          return redirect()->route('permission.index')->with('success', 'Added new Permission');
    } else {
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
    if (Auth::user()->hasPermission('edit-permission')) {
       $data = Permission::find($id);
       $module_id = $data->module_id;
       $data_2 = Permission::where('module_id','=', $module_id)->first();
       return view('permissions.edit', compact('data','data_2'));
    } else {
       return view('error.403');
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
    if (Auth::user()->hasPermission('edit-permission')) {
         $data = Permission::find($id);
         $data->name = Str::slug($request->name);
         $data->display_name = $request->display_name;
         $data->description = $request->description;
         $data->module_id = $request->module_id;
         $data->save();
         return redirect()->route('permission.index')->with('success', 'Updated Permission');
    } else {
         return view('error.403');
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
    if (Auth::user()->hasPermission('delete-permission')) {
          $data = Permission::find($id);
          $data->delete();
          return response()->json([
              'msg'=>true
          ]);
    } else {
        return view('error.403');
    }
    

}
public function attachPermission(Request $request, $role_id)
{
    $role = Role::find($role_id);
    $role->attachPermission($request->permission);
}
public function detachPermission(Request $request, $role_id)
{
    $role = Role::find($role_id);
    $role->detachPermission($request->permission);
}
}