<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\RouteList;
use App\Models\Role;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('app:set-initial-route-list', function () {
    // Clear Existing Route List Table
    RouteList::truncate();
    
    $routes=[
        [ 'name' => 'Home'                  , 'slug' => '/'                                 , 'route_name' => 'home'                       , 'icon' => '<i class="bx bx-home-alt" aria-hidden="true"></i>'             , 'parent_id' => 0],//1
        [ 'name' => 'Management'            , 'slug' => '#'                                 , 'route_name' => null                         , 'icon' => '<i class="fa-solid fa-gear"></i>'                              , 'parent_id' => 0],//2
        [ 'name' => 'Roles & Users'         , 'slug' => '/management/manage-users'          , 'route_name' => 'user.management'            , 'icon' => '<i class="fa-solid fa-user-gear"></i>'                         , 'parent_id' => 2],//
        [ 'name' => 'Route Management'      , 'slug' => '/management/route-management'      , 'route_name' => 'route.management'           , 'icon' => '<i class="fa-solid fa-sitemap"></i>'                           , 'parent_id' => 2],//
        [ 'name' => 'Role Management'       , 'slug' => '/management/role-management'       , 'route_name' => 'role.management'            , 'icon' => '<i class="fa-solid fa-diagram-project"></i>'                   , 'parent_id' => 2],//
        // [ 'name' => 'Terminals'             , 'slug' => '#'                                 , 'route_name' => null                         , 'icon' => '<i class="fa-solid fa-map-location-dot"></i>'                  , 'parent_id' => 0],//
        // [ 'name' => 'Shipment'              , 'slug' => '#'                                 , 'route_name' => null                         , 'icon' => '<i class="fa-solid fa-truck-fast"></i>'                        , 'parent_id' => 0],//
        // [ 'name' => 'Reporting/BI'          , 'slug' => '#'                                 , 'route_name' => null                         , 'icon' => '<i class="fa-solid fa-paste"></i>'                             , 'parent_id' => 0],//
    ];
    foreach($routes as $route){
        $newRoute = new RouteList();
        $newRoute->name             = $route['name'];
        $newRoute->slug             = $route['slug'];
        $newRoute->route_name       = $route['route_name'];
        $newRoute->icon             = $route['icon'];
        $newRoute->parent_id        = $route['parent_id'];
        $newRoute->save();
    }
    echo 'Route table has been build succesfully.';
})->purpose('Setting initial route list');

Artisan::command('app:set-initial-roles', function () {
    // Clear Existing Role List Table
    Role::truncate();
    
    $roles=[
        [ 'name' => 'Admin'],//1
        [ 'name' => 'Chef'],//2
        [ 'name' => 'User'],//3
    ];
    foreach($roles as $role){
        $newRole = new Role();
        $newRole->name = $role['name'];
        $newRole->save();
    }
    echo 'Role table has been build succesfully.';
})->purpose('Setting initial Role list');
