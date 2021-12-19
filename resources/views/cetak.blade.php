<!-- Theme style -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>

@media print {  
  @page {
    size: 210mm 297mm;

  }
}

.pages {
    width: 11cm;
    margin-right: 15cm;
    margin-top: 1cm;
}

</style>
<div class="page">
<div class="container pages">
    <div class="row">
        <div class="col-md-8 text-center">
            PT. Aluminium Indojaya Perkasa<br>
            Jl. Kima 16 Kav DD 7<br>
            Makassar, Sulawesi Selatan<br><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
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