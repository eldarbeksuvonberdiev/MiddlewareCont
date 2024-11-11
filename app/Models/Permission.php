<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'key',
        'name',
        'permission_group_id'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_permissions','permission_id','role_id');
    }

    public function permissionGroup(){
        return $this->belongsTo(PermissionGroup::class);
    }
}
