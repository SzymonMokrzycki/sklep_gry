@extends('admin-view')
@section('con')      
<div class="h2 mt-3"> Edytuj użytkownika</div>

<form action="/update/{{$id}}" method="post">
    @csrf
    <input type="hidden" name="id" value=""/>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Imie') }}</label>
        <div class="col-md-4">
            <input id="name" type="text" class="form-control" name="name" value="{{$name}}" required autocomplete="name" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
        <div class="col-md-4">
            <input id="email" type="text" class="form-control" name="email" value="{{$email}}" required autocomplete="email" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Uprawnienia administratora') }}</label>
        <div class="col-md-4">
            <input id="admin" type="checkbox" class="form-control" name="admin" autofocus>
        </div>
    </div>
    <div class="form-group row ml-auto mr-auto">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-dark">
                {{ __('Zatwierdź') }}
            </button>
        </div>
    </div>
</form>  
@endsection