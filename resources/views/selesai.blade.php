@extends('layouts.master')


@section('title')
    Timbangan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Timbangan</li>
@endsection

@section('content')
<div class="row bg-light">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="alert alert-success alert-dismisible">
                    <i class="fa fa-check icon"></i>
                    Data berhasil disimpan
                </div>
                <div>
                    <a target="_blank" href="{{ route('cetak') }}" class="btn btn-warning" onclick="return !window.open(this.href, 'somesite', 'width=700,height=700')" >Print Timbangan</a>
                    <a href="{{ url("/") }}" class="btn btn-primary">Kembali ke index</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection