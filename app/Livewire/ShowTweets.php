<?php

namespace App\Livewire;

use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Hello, Livewire!2';
    public function render()
    {
        return view('livewire.show-tweets');
    }
}
