@component('components.panel')

    @slot('heading')
        <a href="#">
            {{ $reply->owner->name }}
        </a>
        said {{ $reply->created_at->diffForHumans() }} ...
    @endslot

    @slot('body')
        {{ $reply->body }}
    @endslot

@endcomponent