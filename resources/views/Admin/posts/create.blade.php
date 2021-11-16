@extends('layouts.app')

@section('content')
    <div class="container col-md-6">
        <h1>Crea un post</h1>
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="title">titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Scrivi un titolo..." value="{{old('title')}}">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10" placeholder="Inserisci del contenuto...">{{old('content')}}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            
    
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection