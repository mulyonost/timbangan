@extends('layouts.master')


@section('title')
    Data Timbangan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Timbangan</li>
@endsection

@section('content')

    <div class="row table-responsive">
        <table class="table">
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
                @foreach ($data as $key => $dt)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $dt->ticket_number }}</td>
                    <td>{{ $dt->supplier }}</td>
                    <td>{{ $dt->plate }}</td>
                    <td>{{ $dt->product }}</td>
                    <td>{{ $dt->first_weight }}</td>
                    <td>{{ $dt->second_weight }}</td>
                    <td>{{ $dt->first_weight_time }}</td>
                    <td>{{ $dt->second_weight_time }}</td>
                    <td><a href="{{ route('edit', $dt->id )}}" class="btn btn-primary">Update</a> <a href="{{ route('cetakulang', $dt->id)}}" class="btn btn-primary" target="_blank" onclick="return !window.open(this.href, 'somesite', 'width=700,height=700')">Cetak Ulang</a> <a href="{{ route('detail', $dt->id) }}" class="btn btn-primary">Detail</a> <a href="{{ route('admin.destroy', $dt->id )}}" class="btn btn-danger" onclick="confirm('Are you sure ?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection