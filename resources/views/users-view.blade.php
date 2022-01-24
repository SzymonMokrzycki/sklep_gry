@extends('admin-view')
@section('con')
<div class="h2 mt-4"> Lista użytkowników w bazie</div>
<table class="table mt-4">
<thead>
<tr>
<th scope="col">Imie</th>
<th scope="col">E-mail</th>
<th scope="col">Utworzono</th>
<th scope="col">Zweryfikowany e-mail</th>
<th scope="col">Uprawnienia administratora</th>
<th scope="col">Edytuj</th>
<th scope="col">Usuń</th>
</tr>
</thead>
<tbody>
@foreach($getUsers as $user)
<tr>
<td>{!! $user->name !!}</td>
<td>{!! $user->email !!}</td>
<td>{{$user->created_at}}</td>
<td>@if($user->email_verified_at == null) {{'-'}} @else {{$user->email_verified_at}} @endif</td>
<td>@if($user->is_admin == 1) {{'Tak'}} @else {{'Nie'}} @endif</td>
<td>
@if(Auth::user()->name == $user->name)
    <a href="{{route('edit.user',['id'=>$user->id, 'name'=>$user->name, 'email'=>$user->email])}}" class="btn btn-dark disabled"><i class="fa fa-pencil" aria-hidden="true"></i></a>
@else
    <a href="{{route('edit.user',['id'=>$user->id, 'name'=>$user->name, 'email'=>$user->email])}}" class="btn btn-dark"><i class="fa fa-pencil" aria-hidden="true"></i></a>
@endif
</td>
<td>
    @if(Auth::user()->name == $user->name)
        <a href="{{route('users-delete.view',['name'=>$user->name])}}" class="btn btn-dark disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
    @else
        <a href="{{route('users-delete.view',['name'=>$user->name])}}" onclick="delete_row({{$user->name}})" class="btn btn-dark"><i class="fa fa-trash" aria-hidden="true"></i></a>
    @endif
</td>
@endforeach
</tr>
</tbody>
</table>
@endsection