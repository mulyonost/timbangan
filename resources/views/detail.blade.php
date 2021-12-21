<style>
.foto{
  max-height : 450px;
}
</style>

@extends('layouts.master')

@section('title')
    Detail Timbangan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

<div class="row ml-2">
  Nomor Tiket : {{ $detail->ticket_number }}
</div>
<div class="row ml-2">
  Supplier : {{ $detail->supplier }}
</div>
<div class="row ml-2">
  Plat Mobil : {{ $detail->plate }}
</div>
<div class="row ml-2">
  Produk : {{ $detail->product }}
</div>
<div class="row ml-2">
  Timbang 1 : {{ $detail->first_weight }}
</div>
<div class="row ml-2">
  Timbang 2 : {{ $detail->second_weight }}
</div>
<div class="row ml-2">
  Netto : {{ $detail->nett_weight }}
</div>
<div class="row ml-2">
  Waktu Timbang 1 : {{ $detail->first_weight_time }}
</div>
<div class="row ml-2">
  Waktu Timbang 2 : {{ $detail->second_weight_time }}
</div>
<div class="row ml-2">
  <div class="col-md-5">
      <p>Foto Timbang Pertama</p>
      <img src="{{asset('uploads/'.$detail->first_weight_picture)}}" class="img-fluid" style="width: 80%" alt="">
  </div>
  <div class="col-md-5">
      <p>Foto Timbang Kedua</p>
      <img src="{{asset('uploads/'.$detail->second_weight_picture)}}" class="img-fluid" style="width: 80%" alt="">
  </div>
</div>


@endsection