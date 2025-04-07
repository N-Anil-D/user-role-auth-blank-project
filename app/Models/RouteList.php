<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteList extends Model
{
    //
    use SoftDeletes;

    public function childRoutes()
    {
        return $this->hasMany(RouteList::class,'parent_id','id');
    }
}
