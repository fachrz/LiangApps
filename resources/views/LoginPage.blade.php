@extends('layouts.without_navbar')

@section('pageTitle', 'Login Page')

@section('content')
<div class="login-container">
    <h1 class="logo">LiangApps</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
    @elseif($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form action="/loginAction" method="post" class="login-form">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" required>
        </div>
        <input id="login-submit" type="submit" name="login" class="btn btn-danger btn-block" value="Login">
    </form>
    <p class="register-section">Nggk punya akun? <a href="/register">Daftar yuk!!</a></p>
</div>
@endsection