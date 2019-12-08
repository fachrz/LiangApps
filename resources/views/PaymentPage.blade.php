@extends('layouts.with_navbar_template')

@section('pageTitle', 'Payment Page')

@section('content')
<style>

</style>
<center>
    <h1>MENUNGGU PEMBAYARAN</h1>
    <h4>Kode Pembayaran</h4>
    <h2>{{ $paymentcode }}</h2>
</center>
@endsection