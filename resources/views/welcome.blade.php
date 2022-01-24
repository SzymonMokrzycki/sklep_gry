@extends('layouts.app')
@section('content')
<div class="container-fluid">
  

  <div class="h3 text-center mb-3">Nowości</div>
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top text-center">
    <a class="btn" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->
  
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    @for($i = 0; $i<$length; $i++)
    @if($i != 0 && $i % 6 == 0)
    </div>
    @endif
    @if($i == 0)
    <div class="carousel-item active">
    @elseif($i % 6 == 0)
    <div class="carousel-item">
    @endif
      @if($date >= $getProducts1[$i]->created_at->format('d') && ($date1 > $getProducts1[$i]->created_at->format('m') || $date1 == $getProducts1[$i]->created_at->format('m')) && $date - $getProducts1[$i]->created_at->format('d') <= 2)
        <div class="col-md-2" style="float:left">
          <div class="card mb-auto">
            <img class="card-img-top"
              src="{{$getProducts1[$i]->image}}" height="230px" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">{!!$getProducts1[$i]->title!!}</h4>
              <p class="card-text">{!!$getProducts1[$i]->desc!!}</p>
              <button type="button" 
            onclick="fun('{{$getProducts1[$i]->image}}','{!!$getProducts1[$i]->title!!}','{!!$getProducts1[$i]->category!!}', '{!!$getProducts1[$i]->price!!}', '{!!$getProducts1[$i]->count!!}', '{!!$getProducts1[$i]->publisher!!}', '{!!$getProducts1[$i]->platform!!}', '{!!$getProducts1[$i]->year!!}', '{!!$getProducts1[$i]->desc!!}')" 
            class="btn btn-dark" data-toggle="modal" data-target="#mod">Szczegóły</button>
            </div>
          </div>
        </div>
      @endif
    @endfor
    <!--/.First slide-->
  </div>
  <!--/.Slides-->

</div>
  <div class="h3 text-center mt-5 mb-3">Oferta sklepu</div>
  <div class="container-group row">
    <div class="col-md-2">
      <div class="card">
        <div class="card-header text-center">Kategorie</div>
        <ul class="list-group list-group-flush text-center">
          @foreach($getCategories as $category)
            <li class="list-group-item"><a href="{{route('catt.wel',['category'=>$category->name])}}" class="text-dark">{{$category->name}}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="col-md-10">
      <div class="card">
        <div class="card-body row">
        @foreach($getProducts as $product)
          <div class="thumbnail border-right col-md-3 text-center mb-3 border-bottom">
            <img src="{{$product->image}}" alt="Miniatura" width="150px;" height="200px" class="mb-2"/>
            <div class="caption h4">{{$product->title}}</br></div>
            <span><b>Kategoria:</b> {{$product->category}}</br></span>
            <span><b>Ilość:</b> {{$product->count}}</br></span>
            <span><b>Cena:</b> {{$product->price}} zł</br></span>
            <span><b>Wydawca:</b> {{$product->publisher}}</br></span>
            <span><b>Wystawił:</b> {{$product->user}}</br></br></span>
            <button type="button" 
            onclick="fun('{{$product->image}}','{{$product->title}}','{{$product->category}}', '{{$product->price}}', '{{$product->count}}', '{{$product->publisher}}', '{{$product->platform}}', '{{$product->year}}', '{{$product->desc}}', '{{$product->id}}')" 
            class="btn btn-dark mt-auto mb-2" data-toggle="modal" data-target="#mod">Szczegóły</button>
            <a href="{{route('addtocartcart.view',['id' => $product->id])}}" class="btn btn-dark mb-2">Dodaj do koszyka</a>
          </div>
        @endforeach
        </div>
        {{$getProducts->onEachSide(1)->links()}}
      </div>
    </div>
  </div>
</div>
<script>
  var p;
  function fun(path,title,category, price, count, publisher, platform, year, desc, id){
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
    var d = document.getElementById('dodaj');
    d.onclick = function(){
      var c = document.getElementById('co').value;
      var string = "/add-to-cart/"+id+"/"+c+"";
      d.setAttribute("href", string);
    }
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
            <a id="dodaj" class="btn btn-dark mt-auto mb-2 text-white">Dodaj do koszyka</a>
          </div>
          </div>
        </div>
      </div>
@endsection