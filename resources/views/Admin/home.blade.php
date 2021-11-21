@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{route('admin.posts.index')}}">Visualizza tutti i Post</a></li>
                        <li><a href="{{route('admin.posts.create')}}">Crea un Post</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="{{route('admin.categories.index')}}">Visualizza tutte le Categorie</a></li>
                        <li><a href="{{route('admin.categories.create')}}">Crea una Categoria</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="#">Visualizza tutti i Tags</a></li>
                        <li><a href="#">Crea un Tags</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
