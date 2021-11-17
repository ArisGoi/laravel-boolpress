@extends('layouts.app')

@section('content')
    <div class="container col-md-6">
        <h1>Crea una categoria</h1>
        <form action="{{route('admin.categories.update', $category['id'])}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Scrivi un titolo..." value="{{old('name') ?? $category['name']}}">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-warning">Salva Modifiche</button>
        </form>
    </div>
@endsection