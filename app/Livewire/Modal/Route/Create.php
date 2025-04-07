<?php

namespace App\Livewire\Modal\Route;

use Livewire\Component;
use App\Models\RouteList;
use Illuminate\Support\Facades\Validator; 
use Livewire\Attributes\On;

class Create extends Component
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
        return view('livewire.modal.route.create');
    }

    public function mount()
    {
        $this->mainRoutes = RouteList::where('parent_id',0)->get();
    }

    #[On('create-route')] 
    public function addRoute(){
        $this->selectedRoute = [
            'name' => null,
            'slug' => null,
            'route_name' => null,
            'icon' => null,
            'parent_id' => null,
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
        
        $newRoute = new RouteList;
        $newRoute->name = $validated['name'];
        $newRoute->slug = $validated['slug'];
        $newRoute->route_name = $validated['route_name'];
        $newRoute->icon = $validated['icon'];
        $newRoute->parent_id = $validated['parent_id']==null ? 0:$validated['parent_id'] ;
        $newRoute->save();
        return redirect(route('route.management')); // this is needed for refreshing navigation bar with bootstrap js works properly
        // $this->dispatch(self::model.'CreateModal'.'Hide');
        // $this->dispatch('refresh-route-table');
    }

}
