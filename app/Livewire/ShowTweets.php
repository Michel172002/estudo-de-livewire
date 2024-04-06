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

        Tweet::create([
            'content' => $this->content,
            'user_id' => auth()->user()->id
        ]);
        //ou pode ser assim
        // auth()->user()->tweets()->create([
        //     'content' => $this->content
        // ]);

        $this->content = '';
    }

    public function like($tweetId)
    {
        $tweet = Tweet::find($tweetId);
        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }
    
    public function dislike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
