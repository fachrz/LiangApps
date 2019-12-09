@extends('layouts.with_navbar_template')

@section('pageTitle', 'Admin Dashboard')

@section('content')
<div class="container">
    @if ($message = Session::get('Success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form action="{{ url('/pvalidation') }}" method="post">
    @csrf
    <div class="form-group">
        <input type="text" name="paymentcode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Kode Pembayaran">
        <center><small id="emailHelp" class="form-text text-muted">Dimohon mengecek ulang kodenya :)</small></center>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>
@endsection