<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/cetak.css') }}">
<link rel="stylesheet" type="text/css" href="" media="print" />
<style>

@media print {  
  @page {
    size: 297mm 210mm;
    orientation: landscape;

  }
  body, table {
      font-size: 12px;
  }
  table {
      width: 70mm !important;
  }
}

.pages {
    width: 7cm;
    margin-right: 25cm;
    margin-top: 1cm;
}

</style>
<div class="page">
<div class="container pages">
    <div class="row">
        <div class="col text-center">
            PT. Rajawali Aluminium Perkasa<br>
            Jl. Kima 16 Kav DD 7<br>
            Makassar, Sulawesi Selatan<br><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <td><b>Nomor Timbangan</b></td>
                    <td>{{ $data->ticket_number }}</td>
                </tr>
                <tr>
                    <td><b>Supplier</b></td>
                    <td>{{ $data->supplier }}</td>
                </tr>
                <tr>
                    <td><b>Plat Mobil</b></td>
                    <td>{{ $data->plate }}</td>
                </tr>
                <tr>
                    <td><b>Nama Barang</b></td>
                    <td>{{ $data->product }}</td>
                </tr>
                <tr>
                    <td><b>Waktu T. Pertama</b></td>
                    <td>{{ $data->first_weight_time }}</td>
                </tr>
                <tr>
                    <td><b>Waktu T. Kedua</b></td>
                    <td>{{ $data->second_weight_time }}</td>
                </tr>
                <tr>
                    <td><b>Timbang Pertama</b></td>
                    <td>{{ number_format($data->first_weight) }} Kg</td>
                </tr>
                <tr>
                    <td><b>Timbang Kedua</b></td>
                    <td>{{ number_format($data->second_weight) }} Kg</td>
                </tr>
                <tr>
                    <td><b>Netto</b></td>
                    <td>{{ number_format($data->nett_weight) }} Kg</td>
                </tr>
            </table>

        </div>
    </div>
</div>
</div>

<script>

window.onload = function() { window.print(); }

</script>