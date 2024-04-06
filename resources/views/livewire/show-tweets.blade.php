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
    @if ($tweet->user->photo)
        <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="">
    @else
        <img src="{{ url('imgs/semFoto.png') }}" alt="{{ $tweet->user->name }}">
    @endif
        <p>{{ $tweet->user->name }} - {{ $tweet->content }}</p>
        
        @if ($tweet->likes->count())
            <a href="#" wire:click.prevent="dislike({{ $tweet }})">Descurtir</a>
        @else
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
        @endif
        <br><br>
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
