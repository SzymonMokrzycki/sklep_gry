@extends('layouts.app')
@section('content')      
<div class="h2 mt-3 text-center"> Ustawienia konta</div>

<form action="settt/{{Auth::id()}}" method="post">
    @csrf
    <div class="card"> 
    <input type="hidden" name="id" value=""/>
    <div class="form-group row mt-3">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Imie') }}</label>
        <div class="col-md-4">
            <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
            @if ($errors->has('name'))
                <div style="color: red;">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
        <div class="col-md-4">
            <input id="email" type="text" class="form-control" name="email" value="{{Auth::user()->email}}" required autocomplete="email" autofocus>
            @if ($errors->has('email'))
                <div style="color: red;">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row ml-auto mr-auto">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-dark">
                {{ __('Zatwierdź zmiany') }}
            </button>
        </div>
    </div>
    <span>Po zatwierdzeniu zmian nastapi wylogowanie z konta.</span>
    </div>
</form> 
<div class="h2 mt-3 text-center"> Zmiana hasła</div>
<form action="password/{{Auth::id()}}" method="post">
    @csrf
    <div class="card"> 
    <input type="hidden" name="id" value=""/>
    <div class="form-group row mt-3">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Podaj stare hasło') }}</label>
        <div class="col-md-4">
            <input id="oldpass" type="password" class="form-control" name="oldpass" value="" required autofocus>
            @if ($errors->has('oldpass'))
                <div style="color: red;">
                    {{ $errors->first('oldpass') }}
                </div>
            @endif
            <div style="color: red;">
            @isset($title)
                {{$title}}
            @endisset
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Nowe hasło') }}</label>
        <div class="col-md-4">
            <input id="newpass" type="password" class="form-control" name="newpass" value="" required autofocus>
            @if ($errors->has('newpass'))
                <div style="color: red;">
                    {{ $errors->first('newpass') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Powtórz hasło') }}</label>
        <div class="col-md-4">
            <input id="newpass1" type="password" class="form-control" name="password_confirmation" value="" required autofocus>
            @if ($errors->has('newpass1'))
                <div style="color: red;">
                    {{ $errors->first('newpass1') }}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row ml-auto mr-auto">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-dark">
                {{ __('Zmień hasło') }}
            </button>
        </div>
    </div>
    <span>Po zatwierdzeniu zmian nastapi wylogowanie z konta.</span>
    </div>
</form>
@endsection