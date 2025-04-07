<?php

namespace App\Livewire\Modal\Route;

use Livewire\Attributes\On;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\RouteList;

class Edit extends Component
{
    public $mainRoutes;

    public $selectedRoute;
    public $selectedRouteID;
    public $modalName;
    public $title;
    public $modalPosition;
    public $modalSize;
    public $formButton;
    public $closeButton;
    public $cancelButton;
    const model = 'route';


    public function render()
    {
        return view('livewire.modal.route.edit');
    }

    public function mount()
    {
        $this->mainRoutes = RouteList::where('parent_id',0)->get();
    }


    #[On('edit-route')]
    public function setSelectedRoute($routeID){

        $this->selectedRouteID = $routeID;
        $route = RouteList::find($this->selectedRouteID);
        $this->selectedRoute = [
            'name' => $route->name,
            'slug' => $route->slug,
            'route_name' => $route->route_name,
            'icon' => $route->icon,
            'parent_id' => $route->parent_id,
        ];
    }

    public function saveRoute(){
        $validator  = Validator::make($this->selectedRoute, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'route_name' => 'nullable|string',
            'icon' => 'nullable|string',
            'parent_id' => 'nullable|numeric',
        ]);
        $validated = $validator->validate();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $editRoute = RouteList::find($this->selectedRouteID);
        $editRoute->name = $validated['name'];
        $editRoute->slug = $validated['slug'];
        $editRoute->route_name = $validated['route_name'];
        $editRoute->icon = $validated['icon'];
        $editRoute->parent_id = $validated['parent_id']==null ? 0:$validated['parent_id'] ;
        $editRoute->save();
        return redirect(route('route.management')); // this is needed for refreshing navigation bar with bootstrap js works properly
        // $this->dispatch(self::model.'CreateModal'.'Hide');
        // $this->dispatch('refresh-route-table');
    }

}
