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
use App\Role;
use App\Module;
use Illuminate\Support\Str;
class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-module')) {
            if ($request->ajax()) {
               $data = Module::query();
               return DataTables::of($data)
               ->addColumn('action', function($data){
                   return view('datatables._action-module', [
                       'model'=> $data,
                       'edit_url'=> route('module.edit', $data->id),
                       'delete_url'=> route('module.destroy', $data->id)
                   ]);
               })
               ->editColumn('created_at', function($data){
                return \Carbon\Carbon::parse($data->created_at)->format('Y-m-d');
               })
               ->make(true);
            } 
            
            return view('module.index');
            
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
        if (Auth::user()->hasPermission('create-module')) {
           return view('module.create');
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
        if (Auth::user()->hasPermission('create-module')) {
           $validatedData = $request->validate([
                'name' => 'required',
            ]);
           $data = new Module;
           $data->name = $request->name;
           $data->save();

           return redirect()->route('module.index')->with('success','Added new Module successfully');
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
        if (Auth::user()->hasPermission('edit-module')) {
            $data = Module::find($id);
            return view('module.edit', compact('data'));
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
        if (Auth::user()->hasPermission('edit-module')) {
          $data = Module::find($id);
          $data->name = $request->name;
          $data->save();

          return redirect()->route('module.index')->with('success','Update data Module successfully');
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
       if (Auth::user()->hasPermission('delete-module')) {
            $data = Module::find($id);
            $data->delete();
            return response()->json(['msg'=>true]);
        } else {
            return view('error.403');
        }
    }
}
