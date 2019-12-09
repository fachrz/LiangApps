@extends('layouts.with_navbar_template')
@section('title', 'Cart Page')

@section('content')
<div class="container border">
@foreach ($cartlist as $cl)
  <div class="row no-gutters text-center border">
  <div class="col-sm">
        {{$cl->app_id}}
    </div>
    <div class="col-sm">
      {{$cl->application->app_name}}
    </div>
    <div class="col-sm">
    Rp. {{number_format($cl->application->price, 2, ',', '.')}}
    </div>
    <div class="col-sm">
        <a href="/cartdelete/{{ $cl->app_id }}"><i class="fas fa-trash-alt"></i></a>
    </div>
  </div>
  @endforeach
  <div class="totalprice text-right">
    <p>Total Price</p>  
    Rp. {{ number_format($totalprice, 2, ',', '.') }}
    <br/>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentmethodmodal">Bayar</button>
  </div>
  
</div>

<!-- PaymentMethodModal -->
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
          <input class="form-check-input" type="radio" name="paymentmethod" value="gerai" checked>
          <label class="form-check-label" for="exampleRadios1">
            Alfamart / Indomart
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
@endsection