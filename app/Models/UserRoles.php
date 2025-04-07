<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    
    public function role_auth()
    {
        return $this->hasMany(RoleAuthority::class,'role_id','role_id');
    }
    
    public function user_role_to_role()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }

}
