@extends('admin-view')
@section('con')      
<div class="h2 mt-3"> Edytuj kategorie</div>

<form action="/updateC/{{$id}}" method="post">
    @csrf
    <input type="hidden" name="id" value=""/>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Nazwa') }}</label>
        <div class="col-md-4">
            <input id="name" type="text" class="form-control" name="name" value="{{$name}}" required autocomplete="name" autofocus>
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