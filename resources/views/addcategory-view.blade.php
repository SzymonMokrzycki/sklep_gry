@extends('admin-view')
@section('con')
<div class="h2 mt-4"> Lista kategorii w bazie</div>
<table class="table mt-4">
<thead>
<tr>
<th scope="col">Nazwa</th>
</tr>
</thead>
<tbody>
@foreach($getCategories as $category)
<tr>
<td>{{$category->name}}</td>
<td><a href="{{route('edit.category',['id'=>$category->id,'name'=>$category->name])}}" class="btn btn-dark"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
<td><a href="{{route('categories-delete.view',['name'=>$category->name])}}" onclick="delete_row2({{$category->name}})" class="btn btn-dark"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
@endforeach
</tr>
<tr>
<form action="/addC" method="post">
    @csrf
    <td>
        <input id="name" type="text" class="form-control" name="name" value="" autofocus required>
    </td> 
    <td>
        <button type="submit" class="btn btn-dark">
            {{ __('Dodaj') }}
        </button>
    </td>
    <td></td>
</form>
</tr>
</tbody>
</table>
@endsection