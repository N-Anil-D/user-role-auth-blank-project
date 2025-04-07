<?php

namespace App\Livewire\Management;

use Livewire\Attributes\On;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\RouteList;

class RouteManagement extends Component
{
    const model = 'route';
    public $pageTitle = 'Routes';
    public $routes;
    public $modals;
    public $title = 'Route Management';
    public $table_title = 'Route List';
    public $selectedRoute;
    public $selectedRouteID;

    public function render()
    {
        return view('livewire.management.route-management');
    }

    public function mount(){
        $this->modals = [
            self::model.'CreateModal',
            self::model.'EditModal',
            self::model.'DeleteModal',
        ];
    }

    #[On('refresh-route-table')]
    public function boot(){
        $this->routes = RouteList::get();
    }

    public function addRoute(){
        $this->dispatch('create-route');
        $this->dispatch(self::model.'CreateModal'.'Show');
    }

    public function editRoute($routeID){
        $this->dispatch('edit-route',$this->validateID($routeID));
        $this->dispatch(self::model.'EditModal'.'Show');
    }


    public function deleteRoute($routeID){
        $this->dispatch('delete-route',$this->validateID($routeID));
        $this->dispatch(self::model.'DeleteModal'.'Show');
    }

    private function validateID($id){
        $validator  = Validator::make(['id'=>$id], [
            'id' => 'required|numeric',
        ]);
        $validated = $validator->validate();
        return $validated['id'];
    }

}
