<div>
    Show Tweets

    <p>{{ $message }}</p>

    <form action="" method="POST" wire:submit.prevent="createTweet">
        <input type="text" name="message" id="message" wire:model="message">
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        <p>{{ $tweet->user->name }} - {{ $tweet->content }}</p>
    @endforeach
</div>
