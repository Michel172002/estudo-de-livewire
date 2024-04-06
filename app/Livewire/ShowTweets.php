<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweet;

class ShowTweets extends Component
{
    public $message = 'Hello, Livewire!2';
    public function render()
    {
        $tweets = Tweet::with('user')
        ->get();

        return view('livewire.show-tweets', compact('tweets'));
    }
}
