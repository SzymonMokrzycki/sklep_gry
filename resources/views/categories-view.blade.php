@extends('admin-view')
@section('con')
<div class="h2 mt-4"> Lista kategorii w bazie</div>
<table class="table mt-4">
<thead>
<tr>
    <th scope="col">Nazwa</th>
    <th scope="col">Edytuj</th>
    <th scope="col">Usuń</th>
</tr>
</thead>
<tbody>
@foreach($getCategories as $category)
<tr>
<td>{!! $category->name !!}</td>
<td><a href="{{route('edit.category',['id'=>$category->id,'name'=>$category->name])}}" class="btn btn-dark"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
<td><a href="{{route('categories-delete.view',['name'=>$category->name])}}" onclick="delete_row2({{$category->name}})" class="btn btn-dark"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
@endforeach
</tr>
</tbody>
</table>
<a href="{{route('categories.add')}}" class="btn" id="dodajC"><i class="fas fa-plus-circle fa-3x"></i> </a>
@endsection