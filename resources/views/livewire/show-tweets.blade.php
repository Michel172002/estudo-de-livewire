<div>
    Show Tweets

    <p>{{ $content }}</p>

    <form action="" method="POST" wire:submit.prevent="createTweet">
        <input type="text" name="content" id="content" wire:model="content">
        @error('content')<p>{{ $message }}</p>@enderror
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        <p>{{ $tweet->user->name }} - {{ $tweet->content }}</p>
    @endforeach
</div>
