<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $title = 'Dashboard';
    public $pageTitle = 'Home';

    public function render()
    {
        return view('livewire.dashboard');
    }
}
