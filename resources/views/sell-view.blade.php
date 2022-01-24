@extends('layouts.app')
@section('content')
<script>
    function im(){
        var input = document.getElementById('miniature');
        var image = document.getElementById('pic');
        var file = input.files[0];
        if(file){
            const reader = new FileReader();
            image.classList.remove("d-none");
            reader.onload = function(){
                image.setAttribute("src", this.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
<form action="/selP" enctype="multipart/form-data" method="post">
    @csrf
<div class="card">  
<div class="mt-3 mb-3 card-header"> Wystaw grę na sprzedaż</div>
    <input type="hidden" name="id" value=""/>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Tytuł') }}</label>
        <div class="col-md-4">
            <input id="title" type="text" class="form-control" name="title" value="" required autocomplete="name" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Kategoria') }}</label>
        <div class="col-md-4">
            <input id="category" type="text" class="form-control" name="category" value="" required autocomplete="category" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Ilość') }}</label>
        <div class="col-md-4">
            <input id="count" type="text" class="form-control" name="count" value="" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Cena') }}</label>
        <div class="col-md-4">
            <input id="price" type="text" class="form-control" name="price" value="" autofocus> zł
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Wydawca') }}</label>
        <div class="col-md-4">
            <input id="publisher" type="text" class="form-control" name="publisher" value="" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Platforma') }}</label>
        <div class="col-md-4">
            <input id="platform" type="text" class="form-control" name="platform" value="" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Miniatura') }}</label>
        <div class="col-md-4">
            <img class="d-none form-group" width="120px" height="150px" id="pic"/>
            <input oninput="im()" name="miniature" class="form-control form-control-lg" id="miniature" type="file" accept=".jpg"/>(.jpg)
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>
        <div class="col-md-4">
            <textarea id="desc" class="form-control" name="desc"></textarea>
        </div>
    </div>
    <div class="form-group row ml-auto mr-auto">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-dark">
                {{ __('Wystaw') }}
            </button>
        </div>
    </div>
    </div>
</form>
@endsection