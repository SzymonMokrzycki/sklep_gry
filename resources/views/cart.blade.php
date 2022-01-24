@extends('layouts.app')
@section('content')
    <div class="text-center h2">Twój koszyk:</div>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Produkt</th>
            <th style="width:10%">Cena</th>
            <th style="width:8%">Ilość</th>
            <th style="width:22%" class="text-center">Suma</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{$details['photo']}}" alt="..." width="120px" height="150px"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{$details['title']}} ({{$details['platform']}})</h4>
                        <p>{{$details['desc']}}</p>
                    </div>
                </div>
            </td>
            <td data-th="Price"><input id="p{{$id}}" name="price" class="border-0" type="text" value="{{$details['price']}}" size="5" disabled>PLN</td>
            <td data-th="Quantity">
                <input id="{{$id}}" oninput="s('p{{$id}}', '{{$id}}','w{{$id}}')" type="number" name="i" min="1" max="{{$details['quantity']}}" class="form-control text-center" value="{{$details['quantity']}}">
            </td>
            <td class="subtotal text-center" data-th="Subtotal"><input id="w{{$id}}" name="r" type="text" value="" class="border-0 text-center" disabled></td>
            <td class="actions" data-th="">
                <a href="{{route('remove-cart.view', ['id' =>$id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
        <script>
            function s1(){
                var p = document.getElementsByName('price')
                var i = document.getElementsByName('i');
                var w = document.getElementsByName('r');
                var j;
                for(j = 0; j<w.length; j++){
                    var suma = Math.round(i[j].value*p[j].value * 100)/100;
                    w[j].value = suma;
                }
                var total = 0.0;
                for(j = 0; j<w.length; j++){
                    var liczba = 0.0;
                    if(w[j].value != ""){
                        liczba = Math.round(parseFloat(w[j].value)* 100)/100;
                        total += liczba;
                    }
                }
                var t = Math.round(total* 100)/100;
                document.getElementById("total").innerHTML = t;
            }

            function s(idp, id, idw){
                var p = document.getElementById(idp);
                var i = document.getElementById(id);
                var w = document.getElementById(idw);
                var suma = Math.round(i.value*p.value * 100)/100;
                w.value = suma;
                var sumy = document.getElementsByName('r');
                var j;
                var total = 0.0;
                for(j = 0; j<sumy.length; j++){
                    var liczba = 0.0;
                    if(sumy[j].value != ""){
                        liczba = Math.round(parseFloat(sumy[j].value)* 100)/100;
                        total += liczba;
                    }
                }
                var t = Math.round(total* 100)/100;
                document.getElementById("total").innerHTML = t;
            }
        </script>
        </tbody>
        <tfoot>
        <tr>
            <td><a href="{{route('clear.cart')}}" class="btn btn-dark"><i class="fas fa-times"></i> Wyczyść koszyk</a></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-dark"><i class="fa fa-angle-left"></i> Kontynuuj zakupy</a>@if(Auth::check())<button onclick="przypisz()" type="button" data-toggle="modal" data-target="#mod" class="btn btn-dark ml-2"> Przejdź do podsumowania <i class="fa fa-angle-right"></i></button>@else<button type="button" data-toggle="modal" data-target="#mod1" class="btn btn-dark ml-2"> Przejdź do podsumowania <i class="fa fa-angle-right"></i></button>@endif</td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Razem <strong id="total">0</strong> PLN</strong></td>
        </tr>
        </tfoot>
    </table>
    <div class="modal fade" tabindex="-1" role="dialog" id="mod">
        <div class="modal-dialog" role="document">
            <form action="order" method="post">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="t">Podsumowanie</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                </div>
                      <div class="modal-body">
                        <ul>
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                          <li><input type="text" name="products[]" value="{{$details['title']}}" class="border-0"> x<input type="text" name="ii[]" size="1" class="border-0"> </span>  -  <span name="ss"></span></li>
                        @endforeach
                        @endif
                      </ul>
                      </div>
                
                <div class="modal-footer">
                    <b>Dostawa: 0,00 zł</b>
                    <b>Do zapłaty:</b><input type="text" name="total" size="6" id="tt" class="border-0">
                    <button id="dodaj" type="submit" class="btn btn-dark mt-auto mb-2 text-white">Złóż zamówienie</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="mod1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="t"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                </div>
                      <div class="modal-body">
                          Musisz być zalogowany aby przejść do podsumowania.
                      </div>
                
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script>
    function przypisz(){
        var ilosci = document.getElementsByName('i');
        var ilo = document.getElementsByName('ii[]');
        var ss = document.getElementsByName('r');
        var su = document.getElementsByName('ss');
        var tt = document.getElementById('tt');
        var i, t = 0.0;
        for(i=0; i<ilosci.length; i++){
            ilo[i].value = ilosci[i].value;
            su[i].innerHTML = ss[i].value + "zł";
            t += parseFloat(ss[i].value);
        }
        tt.value = Math.round(t*100)/100+"zł";
    }
    </script>
@endsection
