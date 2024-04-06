<div>
    <h1>Upload da Foto de perfil</h1>
    <form action="" wire:submit.prevent="uploadPhoto">
        <input type="file" wire:model="photo">
        @error('photo')<p>{{ $message }}</p>@enderror
        <button type="submit">Upload</button>
    </form>
</div>
