<?php

namespace App\Livewire\Terminal;

use Livewire\Component;

class Terminal extends Component
{
    public $pageTitle = 'Terminal';
    public $title = 'Terminal';

    public function render()
    {
        return view('livewire.terminal.terminal');
    }
}
