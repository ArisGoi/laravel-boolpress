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
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id" class="form-control" @error('category') is-invalid @enderror>
                    <option value="">-- Nessuna Categoria --</option>
                    @foreach ($categories as $category)
                        <option {{old("category_id") == $category['id'] ? 'selected' : null}} value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                    <div class="custom-control custom-checkbox">
                        <input name="tags[]" value="{{$tag['id']}}" type="checkbox" class="custom-control-input" id="tag-{{$tag['id']}}">
                        <label class="custom-control-label" for="tag-{{$tag['id']}}">{{$tag['name']}}</label>
                    </div>
                @endforeach
            </div>
    
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection