@extends('layouts.with_navbar_template')

@section('title', 'HomePage')

@section('content')
<div class="liangcontainer ">
<div class="appsection clearfix">
@foreach($applist as $al)
<div class="card appcard">
<div class="appthumbnail">
  <img src="{{ asset('images/linelogo.png') }}" class="card-img-top" alt="...">
</div>
  <div class="card-body">
    <h5 class="card-title app-btn" data-toggle="modal" data-target="#infomodal" data-href="{{ $al->id_app }}">{{$al->app_name}}</a></h5>
    <p class="card-text">{{$al->dev_name}}</p>
    @if($al->price == 0 && Session::get('status') != 'admins')
    <p>Gratis</p>
    <button type="button" class="btn btn-success btn-block">Download</button>
    @elseif($al->price == 0 && Session::get('status') == 'admins')
    <p>Gratis</p>
    <button type="button" class="btn btn-danger btn-block app-delete-btn" data-href="{{ $al->id_app }}">Delete</button>
    <button type="button" class="btn btn-warning btn-block app-update-btn" data-toggle="modal" data-target="#updatemodal" data-href="{{ $al->id_app }}">Update</button>
    @elseif($al->price != 0 && Session::get('status') == 'admins')
    <p>Rp. {{number_format($al->price, 2, ',', '.')}}</p>
    <button type="button" class="btn btn-danger btn-block app-delete-btn" data-href="{{ $al->id_app }}">Delete</button>
    <button type="button" class="btn btn-warning btn-block app-update-btn" data-toggle="modal" data-target="#updatemodal" data-href="{{ $al->id_app }}">Update</button>
    @else
    <p>Rp. {{number_format($al->price, 2, ',', '.')}}</p>
    <button type="button" class="btn btn-danger btn-block app-btn" data-toggle="modal" data-target="#infomodal" data-href="{{ $al->id_app }}">Paid Apps</button>
    @endif
  </div>
</div>
@endforeach
</div>
</div>

<!-- infomodal -->
<div class="modal fade" id="infomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apps Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="detail-app-id" style="display: none;"></div>
        <h5 class="card-title"><a href="#" id="detail-app-name"></a></h5>
        <p class="card-text" id="detail-app-developer"></p>
        <p id="detail-app-price"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-cart" data-dismiss="modal">Add to Cart</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-dismiss="modal" data-target="#paymentmethodmodal" >Buy</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="paymentmethodmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ url('/payment') }}" method="post">
      @csrf
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentmethod" value="bca" checked>
          <label class="form-check-label" for="exampleRadios1">
            BCA
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentmethod" value="gerai" checked>
          <label class="form-check-label" for="exampleRadios1">
            Alfamart / Indomart
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentmethod" value="mandiri" checked>
          <label class="form-check-label" for="exampleRadios1">
            Mandiri
          </label>
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Bayar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publish Application (Update)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="text" name="app-name" class="form-control update-app-id" aria-describedby="emailHelp" placeholder="app id" value="" disabled hidden>
        </div>
        <div class="form-group">
            <label for="app-name">Application Name</label>
            <input type="text" name="app-name" class="form-control update-app-name" aria-describedby="emailHelp" placeholder="Nama Aplikasi" value="">
        </div>
        <div class="form-group">
            <label for="developer-name">Nama Developer</label>
            <input type="text" name="developer-name" class="form-control update-developer-name" placeholder="Developer">
        </div>
        <div class="form-group">
            <label for="app-price">Price</label>
            <input type="text" name="app-price" class="form-control update-app-price" placeholder="Harga">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary app-republish-btn" >Republish</button>
      </div>
    </div>
  </div>
</div>

@endsection