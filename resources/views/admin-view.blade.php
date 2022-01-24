@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Panel administratora</div>

        <div class="card-body text-center col-md-12">
                <a class="btn btn-secondary mr-3 col-md-3" href="{{route('users.view')}}">Użytkownicy</a>
                <a class="btn btn-secondary mr-3 col-md-3" href="{{route('products.view')}}">Produkty</a>
                <a class="btn btn-secondary mr-3 col-md-3" href="{{route('categories.view')}}">Kategorie</a>
                <div class="container-group">
                    @yield('con')
                </div>
        </div>
    </div>
</div>
@endsection