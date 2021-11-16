@extends('layouts.app')

@section('content')
    <div class="container col-md-6">
        <h1>Crea un post</h1>
        <form action="{{route('admin.posts.update', $post['id'])}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Scrivi un titolo..." value="{{old('title') ?? $post['title']}}">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10" placeholder="Inserisci del contenuto...">{{old('content') ?? $post['title']}}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            
    
            <button type="submit" class="btn btn-warning">Salva Modifiche</button>
        </form>
    </div>
@endsection