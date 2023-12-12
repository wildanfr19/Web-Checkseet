<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\Module;
use App\User;
use App\Order;
use App\OrderDetails;
use App\Checkseet;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\Auth::user()->hasRole('admin')) {
            $role = Role::count();
            $permission = Permission::count();
            $module = Module::count();
            $user = User::count();
            return view('admin-dashboard.home', [
                'user'=> $user,
                'role'=> $role,
                'permission'=> $permission,
                'module'=> $module
            ]);
        } elseif(\Auth::user()->hasRole('user')) {
            $model = new Checkseet;
            $count = $model->querycheckUsers()->count();
            return view('user-dashboard.home', compact('count'));
        } elseif (\Auth::user()->hasRole('ict-adyawinsa')) {
            $model = new Checkseet;
            $count = $model->querycheck()->count();
            return view('user-dashboard.ict-adw.home', compact('count'));
        } elseif(\Auth::user()->hasRole('departemen-head')){
            $model = new Checkseet;
            $count = $model->querycheck()->count();
             return view('user-dashboard.dep-head.home',compact('count'));
        } else {
            return view('error.403');
        }
        
        
    }
    public function home_()
    {
        return view('layouts.dashboard');
    }
}
