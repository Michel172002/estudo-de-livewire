<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = '';
    
    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {
        $tweets = Tweet::with('user')
        ->latest()
        ->paginate(15);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function createTweet()
    {
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        $this->content = '';
    }
}
