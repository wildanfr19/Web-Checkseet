<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
     protected $fillable = [
     	'name',
        'display_name',
        'description'
    ];

    public function permission_role()
    {
        return $this->hasMany('App\RolePermission');
    }
    public function getRoles()
    {
    	$getData = \DB::connection('db_checkseet')->table('roles')->get();
    	return $getData;
    }
}
