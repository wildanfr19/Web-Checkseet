<?php

namespace App;

use Laratrust\Models\LaratrustPermission;
use App\RolePermission;
class Permission extends LaratrustPermission
{
     protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function permission_role()
    {
        return $this->hasMany('App\RolePermission');
    }

    public function permission_with_role($permission_id, $role_id)
    {
        return RolePermission::where('permission_id', $permission_id)
            ->where('role_id', $role_id)->first();
    }
    public function getModuleAttribute()
    {
        $getData = \DB::connection('db_checkseet')->table('modules')->get();
        return $getData;
    }
}
