@extends('admin-view')
@section('con')      
<div class="h2 mt-3"> Edytuj produkt</div>

<form action="/updateP/{{$id}}" method="post">
    @csrf
    <input type="hidden" name="id" value=""/>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Tytuł') }}</label>
        <div class="col-md-4">
            <input id="title" type="text" class="form-control" name="title" value="{{$title}}" required autocomplete="name" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Kategoria') }}</label>
        <div class="col-md-4">
            <input id="category" type="text" class="form-control" name="category" value="{{$category}}" required autocomplete="email" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Ilość') }}</label>
        <div class="col-md-4">
            <input id="count" type="text" class="form-control" name="count" value="{{$count}}" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Cena') }}</label>
        <div class="col-md-4">
            <input id="price" type="text" class="form-control" name="price" value="{{$price}}" autofocus> zł
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Wydawca') }}</label>
        <div class="col-md-4">
            <input id="publisher" type="text" class="form-control" name="publisher" value="{{$publisher}}" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Platforma') }}</label>
        <div class="col-md-4">
            <input id="platform" type="text" class="form-control" name="platform" value="{{$platform}}" autofocus>
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