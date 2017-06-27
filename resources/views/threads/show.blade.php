@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @component('components.panel')
                    @slot('heading')
                        <a href="#">{{ $thread->creator->name }}</a>
                        posted :
                        {{ $thread->title }}
                    @endslot

                    @slot('body')
                        {{ $thread->body }}
                    @endslot
                @endcomponent
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

    </div>
@endsection