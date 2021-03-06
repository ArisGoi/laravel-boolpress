@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                    <h1>{{$post["title"]}}</h1>
                    <p>
                        <span style="font-size: 18px">slug:</span>
                        <span style="text-decoration: underline; margin-left:10px">{{$post["slug"]}}</span>
                    </p>

                    <p>{{$post["content"]}}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
