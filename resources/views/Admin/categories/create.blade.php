@extends('layouts.app')

@section('content')
    <div class="container col-md-6">
        <h1>Crea una categoria</h1>
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Scrivi un nome per la categoria" value="{{old('name')}}">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection