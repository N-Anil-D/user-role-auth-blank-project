<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    public function roleAuths()
    {
        return $this->hasMany(RoleAuthority::class,'role_id','id');
    }

}
