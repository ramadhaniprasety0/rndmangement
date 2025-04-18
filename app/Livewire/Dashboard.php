<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $layout = 'layouts.app'; 
    
    public function render()
    {
        return view('livewire.dashboard');
    }
}

class Pengguna extends Component
{
    public $layout = 'layouts.app'; 
    
    public function render()
    {
        return view('livewire.Pengguna');
    }
}
