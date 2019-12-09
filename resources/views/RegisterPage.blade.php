@extends('layouts.without_navbar')

@section('title', 'Register Page')
<div class="login-container">
    <h1 class="logo">LiangApps</h1>
    <p>Silahkan Mendaftar jika tidak punya akun</p>
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
    <form action="/registerAction" method="post" class="register-form border">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Nama" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" name="first-name" class="form-control" id="first-name" aria-describedby="emailHelp" placeholder="Masukan Nama Depan" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="last-name" class="form-control" id="last-name" placeholder="Masukan Nama Belakang" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                <label for="no-telp">No Telepon</label>
                <input type="text" name="no-telp" class="form-control" id="no-telp" placeholder="Masukan Nomor Telepon" required>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat" required>
                </div>
            </div>
        </div>
        <input id="register-submit" type="submit" name="register" class="btn btn-danger btn-block" value="Daftar">
    </form>
    <p class="register-section">Sudah punya akun? <a href="{{url('/login')}}">Login Ajahh!!</a></p>
</div>  