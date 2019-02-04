@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">{{ $thread->creator->name }}</a> posted:
                        {{ $thread->title }}
                    </div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>

        @if(\Auth()->check())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <form method="post" action="/threads/{{ $thread->id }}/replies">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
                            </div>

                            <button>Send</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center"> Please <a href="{{ route('login') }}">sign in</a> to participate in this discution</p>
        @endif
    </div>
@endsection
