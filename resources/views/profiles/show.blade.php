@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{ $profileUser->name }}
                <smal>Since {{ $profileUser->created_at->diffForHumans() }}</smal>
            </h1>
        </div>
        @foreach($threads as $thread)
            @component('components.panel')
                @slot('heading')
                    <div class="level">
                        <span class="flex">
                            <a href="#">{{ $thread->creator->name }}</a>
                            posted :
                            {{ $thread->title }}
                        </span>
                        <span>
                            {{ $thread->created_at->diffForHumans() }}
                        </span>
                    </div>
                @endslot

                @slot('body')
                    {{ $thread->body }}
                @endslot
            @endcomponent
        @endforeach
        {{ $threads->links() }}
    </div>
@endsection