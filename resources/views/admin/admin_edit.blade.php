@extends('layouts.master')

<style>
  .foto{
    max-height : 350px;
  }
  </style>

@section('title')

    Update Timbangan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <h5 class="card-header">Input Timbangan</h5>
        <div class="card-body">
          <form action="{{ route('admin.update', $weight->id) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-md-4"><label>Nomor Ticket</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="ticket_number" id="ticket_number" value="{{ $weight->ticket_number }}" readonly></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Nama Supplier</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="supplier" id="supplier" value="{{ $weight->supplier }}"></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Plat Mobil</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="plate" id="plate" value="{{ $weight->plate }}"></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Nama Barang</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="product" id="product" value="{{ $weight->product }}"></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Timbang 1</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="first_weight" id="first_weight" value="{{ $weight->first_weight }}"></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Timbang 2</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="second_weight" id="second_weight" value="{{ $weight->second_weight }}"></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Berat Netto</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="nett_weight" id="nett_weight" readonly></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label></label>
              </div>
              <div class="col-md-5"><button type="submit" class="form-control btn btn-primary">Submit</button></div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <h5 class="card-header">Cam</h5>
        <div class="card-body">
          <div class="row">
          <div class="col-md-6">
            Foto Timbangan Pertama
            <img src="{{asset('uploads/'.$weight->first_weight_picture)}}" class="img-thumbnail">
          </div>
          <div class="col-md-6">
            Foto Timbangan Kedua
            <img src="{{asset('uploads/'.$weight->second_weight_picture)}}" class="img-thumbnail">
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <h5 class="card-header">Transaksi Terakhir</h5>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Ticket</th>
                <th>Supplier</th>
                <th>Plat Mobil</th>
                <th>Produk</th>
                <th>T. Kosong</th>
                <th>T. Isi</th>
                <th>Waktu T. Kosong</th>
                <th>Waktu T. Isi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>

function kalkulasi(){
  var first = $('#first_weight').val();
  var second = $('#second_weight').val();
  var nett = Math.abs(first-second);
  $('#nett_weight').val(nett);
}

$(function() {
  $('#second_weight').on("keyup change", kalkulasi);
  $('#first_weight').on("keyup change", kalkulasi);
});

$(document).ready(function(){
  kalkulasi();
})

</script>

@endpush