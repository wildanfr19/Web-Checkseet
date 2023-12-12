<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/home_', 'HomeController@home_')->name('dashboard');


Route::group(['middleware' => ['auth']], function() {
   // :: ADMIN ::
   Route::get('/home', 'HomeController@index')->name('home');
   Route::resource('user', 'UserControllerManage');
   Route::resource('permission', 'PermissionController');
   Route::post('detach-permission/{role_id}', 'PermissionController@detachPermission')->name('permission.detach');
   Route::post('attach-permission/{role_id}', 'PermissionController@attachPermission')->name('permission.attach');
   Route::resource('role', 'RolesController');
   Route::resource('module', 'ModuleController');
   //:: USERS ::
   Route::get('/checkseet/manage', 'CheckseetController@index')->name('checkseet.index');
   Route::get('/checkseet/create', 'CheckseetController@create')->name('checkseet.create');
   Route::get('/checkseet/master-item', 'CheckseetController@masterItem')->name('checkseet.masteritem');
   Route::post('/checkseet/store-checkseet', 'CheckseetController@storeCheckseet')->name('checkseet.store');
   Route::get('/checkseet/{param}/viewheader', 'CheckseetController@viewHeader')->name('checkseet.viewHeader');
   Route::get('/checkseet/{param}/{param2}/viewDetail', 'CheckseetController@viewDetail')->name('checkseet.viewDetail');
   Route::get('/checkseet/{param}/edit-header', 'CheckseetController@editHeader')->name('checkseet.editHeader');
   Route::get('/checkseet/{param}/{param2}/edit-detail', 'CheckseetController@editDetail')->name('checkseet.editDetail');
   Route::get('/checkseet/{param}/edit-detail-items', 'CheckseetController@editDetailItems')->name('checkseet.editDetailItems');
   Route::put('/checkseet/update/{param}', 'CheckseetController@update')->name('checkseet.update');
   Route::put('/checkseet/update-detail/{param}', 'CheckseetController@updateDetail')->name('checkseet.updateDetail');
   Route::delete('/checkseet/deleted/{param}', 'CheckseetController@deleted')->name('checkseet.deleted');
   Route::post('/checkseet/approve-ict/{param}', 'CheckseetController@approveIct')->name('checkseet.approve-ict');
   Route::post('/checkseet/approve-users/{param}', 'CheckseetController@approveUsers')->name('checkseet.approve_users');
   Route::post('/checkseet/approve-head/{param}', 'CheckseetController@approveHead')->name('checkseet.approve-head');

});
