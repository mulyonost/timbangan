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
<div class="row">
  
</div>


@endsection