<?php

namespace App\Livewire\Modal\Route;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\RouteList;

class Delete extends Component
{
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
        return view('livewire.modal.route.delete');
    }

    #[On('delete-route')]
    public function setSelectedRoute($routeID){

        $this->selectedRouteID = $routeID;
        $this->selectedRoute = RouteList::find($this->selectedRouteID);
    }

    public function killThisRoute(){

        $this->selectedRoute->delete();
        return redirect(route('route.management')); // this is needed for refreshing naviggation bootstrap js works properly
        // $this->dispatch(self::model.'CreateModal'.'Hide');
        // $this->dispatch('refresh-route-table');

    }

}
