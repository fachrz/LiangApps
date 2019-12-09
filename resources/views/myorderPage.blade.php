@extends('layouts.with_navbar_template')

@section('pageTitle', 'Payment Page')

@section('content')
@if ($message = Session::get('Success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID Order</th>
      <th scope="col">Email</th>
      <th scope="col">Order Date</th>
      <th scope="col">Payment Code</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
      @foreach($temporder as $to)
    <tr>
      <th scope="row">{{$to->id_temporder}}</th>
      <td>{{$to->email}}</td>
      <td>{{$to->date_temporder}}</td>
      <td>{{$to->payment_code}}</td>
      <td>
        <a href="{{ url('/removeorder/'.$to->id_temporder) }}"><button type="button" class="btn btn-danger">Batalkan</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
