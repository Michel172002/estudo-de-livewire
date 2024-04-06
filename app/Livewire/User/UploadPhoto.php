<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function uploadPhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:1024',
        ]);

        /**
         * @var User $user
         */
        $user = auth()->user();

        $nameFile = Str::slug($user->name) . $this->photo->getClientOriginalName();

        if ($path = $this->photo->storeAs('users', $nameFile)) {
            $user->update([
                'profile_photo_path' => $path,
            ]);
        };
            
        return redirect()->route('tweets.index');
    }
}
