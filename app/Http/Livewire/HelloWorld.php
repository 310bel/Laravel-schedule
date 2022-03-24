<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Vlad';
    public $ok = false;
    public $greeting = ['Goodbye'];

    public function render()
    {
        return view('livewire.hello-world');
    }
}
