<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAuthority extends Model
{
        
    public function roleAuth_to_Route()
    {
        return $this->hasMany(RouteList::class,'id','route_id');
    }
    

}
