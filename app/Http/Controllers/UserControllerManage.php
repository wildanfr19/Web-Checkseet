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
class UserControllerManage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-user')) {
            if ($request->ajax()) {
            $user = DB::connection('db_checkseet')->table('role_user')
                ->leftJoin('users','role_user.user_id','=','users.id')
                ->leftJoin('roles','role_user.role_id','=','roles.id')
                ->select(DB::raw('users.name as "name"'),
                 DB::raw('roles.display_name as "role_name"'), 'users.id')
                ->get();
            return DataTables::of($user)
            ->addColumn('action', function ($user) {
                return view('datatables._action-user', [
                    'model' => $user,
                    'edit_url'=> route('user.edit', $user->id),
                    'delete_url'=> route('user.destroy', $user->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
        }
           return view('users.index');
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
        if (Auth::user()->hasPermission('create-user')) {
              return view('users.create');
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
        // dd($request->all());
           if (Auth::user()->hasPermission('create-user')) {
               $validatedData = $request->validate([
                    'name' => 'required',
                    // 'email' => 'required|unique:users',
                    'username' => 'required|unique:users',
                    'password' =>  'required|min:6|confirmed',
                    'password_confirmation' => 'min:6',
                    'role_id' => 'required'
                ]);

                $user = new User();
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->kode_asset = ($request->kode_asset == null) ? '-': $request->kode_asset;
                $user->save();

                $role_user = new RoleUser();
                $role_user->user_id = $user->id;
                $role_user->role_id = $request->role_id;
                $role_user->user_type = 'App\User';
                $role_user->save();

                return redirect()->route('user.index')->with('success', __('User successfully created'));
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
        if (Auth::user()->hasPermission('edit-user')) {
             $user = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select(
                    'users.id as id',
                    'users.name as name',
                    'users.email as email',
                    'roles.name as role_name',
                    'roles.id as role_id',
                    'users.username'
                )
                ->where('users.id', $id)
                ->first();

                // dd($user->role_id); 
           // if ($user->role_name == 'User') {
            
           //      return redirect()->route('users.index');
           //  } else {
            
                return view('users.edit', compact('user', 'roles'));
            // }
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
          if (Auth::user()->hasPermission('edit-user')) {
              $validatedData = $request->validate([
                'email' => 'required|unique:users,email,' . $id,
                'role_id' => 'required',
                'name' => 'required',
            ]);

            $user = User::find($id);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->save();

            
            DB::connection('db_checkseet')->table('role_user')->where('user_id', '=', $id)
                ->update(['role_id' => $request->role_id]);

            return redirect()->route('user.index')->with('success', __('User successfully updated'));
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
        if (Auth::user()->hasPermission('delete-user')) {
           $user = User::find($id);
           $user->delete();
           return response()->json([
               'msg'=>true
           ]);
        } else {
           return view('error.403');
        }
        

    }
}
