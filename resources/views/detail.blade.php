@extends('layouts.master')

@section('title')
    Detail Timbangan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-3">
        <table class="table table-bordered">
            <tr>
                <td><b>Nomor Timbangan</b></td>
                <td>{{ $detail->ticket_number }}</td>
            </tr>
            <tr>
                <td><b>Supplier</b></td>
                <td>{{ $detail->supplier }}</td>
            </tr>
            <tr>
                <td><b>Plat Mobil</b></td>
                <td>{{ $detail->plate }}</td>
            </tr>
            <tr>
                <td><b>Nama Barang</b></td>
                <td>{{ $detail->product }}</td>
            </tr>
            <tr>
                <td><b>Waktu T. Pertama</b></td>
                <td>{{ $detail->first_weight_time }}</td>
            </tr>
            <tr>
                <td><b>Waktu T. Kedua</b></td>
                <td>{{ $detail->second_weight_time }}</td>
            </tr>
            <tr>
                <td><b>Timbang Pertama</b></td>
                <td>{{ number_format($detail->first_weight) }} Kg</td>
            </tr>
            <tr>
                <td><b>Timbang Kedua</b></td>
                <td>{{ number_format($detail->second_weight) }} Kg</td>
            </tr>
            <tr>
                <td><b>Netto</b></td>
                <td>{{ number_format($detail->nett_weight) }} Kg</td>
            </tr>
        </table>
    </div>
    <div class="col-md-4">
      <p>Foto Timbang Pertama</p>
      <img src="{{asset('uploads/'.$detail->first_weight_picture)}}" class="img-fluid" style="width: 100%" alt="">
    </div>
    <div class="col-md-4">
        <p>Foto Timbang Kedua</p>
        <img src="{{asset('uploads/'.$detail->second_weight_picture)}}" class="img-fluid" style="width: 100%" alt="">
    </div>
</div>
@endsection