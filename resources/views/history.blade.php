@extends('layouts.app')
@section('content')
<div class="text-center h2">Historia zakupów</div>
<table class="table mt-4 text-center">
    <thead>
        <tr class="bg-dark text-white"><th scope="col">Produkty</th><th scope="col">Suma</th><th scope="col">Data zakupu</th></tr>
    </thead>
    <tbody>
        @if(count($getHistory) != 0)
            @foreach($getHistory as $history)
            <tr><td>{{$history->products}}</td><td>{{$history->sum}} zł</td><td>{{$history->created_at}}</td>
            @endforeach    
        </tr>
        @else
            <tr><td></td><td>Brak wpisów</td><td></td></tr>
        @endif
    </tbody>
</table>
@endsection