@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Phone number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($users as $user)
    <tr>
      <th scope="row">{{$user -> id}}</th>
      <td>{{$user->email}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->surname}}</td>
      <td>{{$user->phone_number}}</td>
      <td>
        <button class="btn btn-danger btn-sm delete" data-id="{{$user -> id}}">X</button>
      </td>
      <td></td>
    </tr>
      @endforeach
  </tbody>
</table>
{{$users->links()}}
</div>
@endsection


@section('javascript')
const deleteURL = "{{url ('users')}}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>

@endsection
