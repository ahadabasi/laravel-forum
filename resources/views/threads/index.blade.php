@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @foreach($threads as $thread)
                    @component('components.panel')
                        @slot('heading')
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{ $thread->path() }}">
                                        {{ $thread->title }}</a>
                                </h4>
                                <a href="{{ $thread->path() }}#comments">
                                    {{ $thread->replies_count }}
                                    {{ str_plural('comment', $thread->replies_count) }}
                                </a>
                            </div>
                        @endslot

                        @slot('body')
                            {{ $thread->body }}
                        @endslot
                    @endcomponent
                @endforeach

            </div>
        </div>
    </div>
@endsection