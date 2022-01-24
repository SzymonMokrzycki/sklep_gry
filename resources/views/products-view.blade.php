@extends('admin-view')
@section('con')
<div class="h2 mt-4"> Lista produktów w bazie</div>
<table class="table mt-4">
<thead>
<tr>
<th scope="col">Tytuł</th>
<th scope="col">Kategoria</th>
<th scope="col">Ilość</th>
<th scope="col">Cena</th>
<th scope="col">Wydawca</th>
<th scope="col">Platforma</th>
<th scope="col">Edytuj</th>
<th scope="col">Usuń</th>
</tr>
</thead>
<tbody>
@foreach($getProducts as $product)
<tr>
<td>{!! $product->title !!}</td>
<td>{!!$product->category!!}</td>
<td>{!!$product->count!!}</td>
<td>{!!$product->price!!} zł</td>
<td>{!!$product->publisher!!}</td>
<td>{!!$product->platform!!}</td>
<td><a href="{{route('edit.product', ['id'=>$product->id, 'title'=>$product->title, 'category'=>$product->category, 'count'=>$product->count, 'price'=>$product->price, 'publisher'=>$product->publisher, 'platform'=>$product->platform])}}" class="btn btn-dark"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
<td><a href="{{route('products-delete.view',['title'=>$product->title])}}" onclick="delete_row1({{$product->title}})" class="btn btn-dark"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
@endforeach
</tr>
</tbody>
</table>
<a href="{{route('products.add')}}" class="btn" id="dodajP"><i class="fas fa-plus-circle fa-3x"></i> </a>
@endsection