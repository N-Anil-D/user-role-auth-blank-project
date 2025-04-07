<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\RouteList;
use Illuminate\Support\Facades\Auth;

class LeftNavigationBar extends Component
{
    public $navRoutes;

    #[On('refresh-route-table')]
    public function render()
    {
        return view('livewire.left-navigation-bar');
    }
    
    public function boot(){
        $userRouteLimits = Auth::user()->user_role->role_auth->pluck('route_id')->toArray();
        $this->navRoutes = RouteList::whereIn('id',$userRouteLimits)->where('parent_id',0)->get();

    }
}
