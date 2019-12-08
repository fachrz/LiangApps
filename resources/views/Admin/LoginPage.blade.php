@extends('layouts.without_navbar')

@section('pageTitle', 'Admin Login Page')

@section('content')
<div class="login-container">
    <h1 class="logo">LiangApps Admin</h1>

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
    <form action="/adminLoginAction" method="post" class="login-form">
        @csrf
        <div class="form-group">
            <label for="email">Username</label>
            <input type="text" name="username" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" required>
        </div>
        <input id="login-submit" type="submit" name="login" class="btn btn-danger btn-block" value="Login">
    </form>
</div>
@endsection