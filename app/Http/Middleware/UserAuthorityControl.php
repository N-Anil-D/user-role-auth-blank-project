<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\RouteList;

class UserAuthorityControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $detectRoute = RouteList::where('slug',$request->getRequestUri())->first();//get current uri and search in route table
        if ($detectRoute->parent_id != 0) {
            $route = RouteList::find($detectRoute->parent_id);//if request is child route suppose is like parent
        }else{
            $route = $detectRoute;//if request is parent route do nothing
        }
        $userAuthorities = Auth::user()->user_role->role_auth->pluck('route_id')->toArray();//get user route authorities and make it array
        // dd($route , in_array($route->id, $userAuthorities));
        if($route && in_array($route->id, $userAuthorities)){
            
            return $next($request);
            
        }else{
            
            session()->flash('error', 'Access Denied');
            dd('Middleware Error');
            return redirect()->route('home');
            
        }
    }
}
