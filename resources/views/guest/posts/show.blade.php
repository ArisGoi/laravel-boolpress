@extends('layouts.guest')

@section('pageContent')
    <div class="row">
        <div class="col-md-12 blog-main">
            <h1 class="blog-post-title">{{$post['title']}}</h1>

            <p class="blog-post-meta">{{$post->created_at->diffForHumans()}}</p>

            <p>
                {{$post['content']}}
            </p>
        </div>
    </div>
@endsection