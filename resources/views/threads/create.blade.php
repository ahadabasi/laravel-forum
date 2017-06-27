@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @component('components.panel')

                    @slot('heading')
                        Create a New Thread
                    @endslot

                    @slot('body')
                        <form method="POST" action="/threads">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea class="form-control" name="body" id="body" rows="8"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    @endslot

                @endcomponent
            </div>
        </div>
    </div>
@endsection