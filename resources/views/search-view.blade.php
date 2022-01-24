@extends('layouts.app')
@section('content')
<div class="h3 text-center mt-5 mb-3">Wyniki wyszukiwania dla "{!!$se!!}"</div>
  <div class="container-group row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body row">
        @foreach($getProducts as $product)
        @if($product->category == $search || $product->title1 == $search || $product->publisher == $search || $product->platform == $search)
          <div class="thumbnail border-right col-md-3 text-center mb-3 border-bottom">
            <img src="{{$product->image}}" alt="Miniatura" width="150px;" height="200px" class="mb-2"/>
            <div class="caption h4">{{$product->title}}</br></div>
            <span><b>Kategoria:</b> {{$product->category}}</br></span>
            <span><b>Ilość:</b> {{$product->count}}</br></span>
            <span><b>Cena:</b> {{$product->price}} zł</br></span>
            <span><b>Wydawca:</b> {{$product->publisher}}</br></span>
            <span><b>Wystawił:</b> {{$product->user}}</br></br></span>
            <button type="button" 
            onclick="fun('{{$product->image}}','{{$product->title}}','{{$product->category}}', '{{$product->price}}', '{{$product->count}}', '{{$product->publisher}}', '{{$product->platform}}', '{{$product->year}}', '{{$product->desc}}')" 
            class="btn btn-dark mt-auto mb-2" data-toggle="modal" data-target="#mod">Szczegóły</button>
            <a href="{{route('addtocartcart.view',['id' => $product->id])}}" class="btn btn-dark mb-2">Dodaj do koszyka</a>
          </div>
        @endif
        @endforeach
        @if($c == $licznik)
          <h3>Brak wyników</h3>
        @endif
        </div>
        {{$getProducts1->onEachSide(1)->links()}}
      </div>
    </div>
  </div>
</div>
<script>
  var p;
  function fun(path,title,category, price, count, publisher, platform, year, desc){
    p = price;
    document.getElementById('t').innerHTML = title;
    document.getElementById('i').src = path;
    document.getElementById('k').innerHTML = "<b>Kategoria:</b> "+category;
    document.getElementById('co').value = count;
    document.getElementById('co').max = count;
    document.getElementById('c').innerHTML = "<b>Suma:</b> "+Math.round(price*document.getElementById('co').value*100)/100+" zł";
    document.getElementById('y').innerHTML = "<b>Rok wydania:</b> "+year;
    document.getElementById('pu').innerHTML = "<b>Wydawca:</b> "+publisher;
    document.getElementById('pl').innerHTML = "<b>Platforma:</b> "+platform;
    document.getElementById('d').innerHTML = "<b>Opis:</b> </br>"+desc;
  }
  function oblicz(){
    var suma = Math.round(p*document.getElementById('co').value*100)/100;
    document.getElementById('c').innerHTML = "<b>Suma:</b> "+suma+" zł";
  }
</script>
      <div class="modal fade" tabindex="-1" role="dialog" id="mod">
        <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
              <h5 class="modal-title" id="t"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <img alt="Miniatura" width="220px;" height="300px" class="mb-2 mr-2 float-left" id="i"/>
                        <ul style="list-style:none;">
                          <li><span id="k"> </span></li>
                          <li><span id="y"> </span></li>
                          <li><span id="pu"> </span></li>
                          <li><span id="pl"> </span></li>
                        <p id="d"></p>
                      </ul>
                      </div>
          <div class="modal-footer">
            Ilość:
            <input type="number" id="co" onclick="oblicz()" min="1"/>
            <span id="c"> </span>
            <a href="#" class="btn btn-dark mt-auto mb-2">Dodaj do koszyka</a>
          </div>
          </div>
        </div>
      </div>
@endsection