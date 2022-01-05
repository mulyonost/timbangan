@extends('layouts.master')

@section('title')
    Menu Utama
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

<?php 

$output = exec("mode COM5: BAUD=115200 PARITY=N data=8 stop=1 XON=off TO=on dtr=off odsr=off octs=off rts=on idsr=off");


?>
<div class="container-fluid">
  <div class="row">
    Read From Serial {{ $output }}
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <h5 class="card-header">Input Timbangan</h5>
        <div class="card-body">
          <form action="{{ route('store') }}" method="post" autocomplete="off">
            @csrf
            <div class="row">
              <div class="col-md-4"><label>Nomor Ticket</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="ticket_number" id="ticket_number" readonly></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Nama Supplier</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="supplier" id="supplier" list="supp" required>
                <datalist id=supp>
                   <select name=spl>
                    <option value="">
                    <option>AMIN LOGAM
                    <option>RUSMIN
                    <option>ERIK
                    <option>JAYA ALUMINIUM
                   </select>
                 </datalist>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Plat Mobil</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="plate" id="plate" required></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Nama Barang</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="product" id="product" required></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Timbang 1</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="first_weight" id="first_weight" required></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label>Timbang 2</label>
              </div>
              <div class="col-md-5"><input type="text" class="form-control" name="second_weight" id="second_weight" readonly></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><label></label>
              </div>
              <div class="col-md-5"><button type="submit" class="form-control btn btn-primary">Submit</button></div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <h5 class="card-header">Cam</h5>
        <div class="card-body">
          <div class="img-zoom-container">
            <img src="http://192.168.1.200:81/mjpg/tbg" id="myimage" class="img-fluid foto">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <div class="row">
    <div class="col">
      <div class="card">
        <h5 class="card-header">Transaksi Belum Selesai</h5>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Ticket</th>
                <th>Supplier</th>
                <th>Plat Mobil</th>
                <th>Produk</th>
                <th>T. 1</th>
                <th>T. 2</th>
                <th>Waktu T. 1</th>
                <th>Waktu T. 2</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($unfinished as $key => $un)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $un->ticket_number }}</td>
                  <td>{{ $un->supplier }}</td>
                  <td>{{ $un->plate }}</td>
                  <td>{{ $un->product }}</td>
                  <td>{{ $un->first_weight }}</td>
                  <td>{{ $un->second_weight }}</td>
                  <td>{{ $un->first_weight_time }}</td>
                  <td>{{ $un->second_weight_time }}</td>
                  <td><a href="{{ route('edit', $un->id )}}" class="btn btn-primary">Update</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <h5 class="card-header">Transaksi Terakhir</h5>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Ticket</th>
                <th>Supplier</th>
                <th>Plat Mobil</th>
                <th>Produk</th>
                <th>T. 1</th>
                <th>T. 2</th>
                <th>Waktu T. 1</th>
                <th>Waktu T. 2</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($last as $key => $un)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $un->ticket_number }}</td>
                  <td id="lastSupplier">{{ $un->supplier }}</td>
                  <td id="lastPlate">{{ $un->plate }}</td>
                  <td id="lastProduct">{{ $un->product }}</td>
                  <td>{{ $un->first_weight }}</td>
                  <td id="lastWeight">{{ $un->second_weight }}</td>
                  <td>{{ $un->first_weight_time }}</td>
                  <td i="lastWeightTime">{{ $un->second_weight_time }}</td>
                  <td><button class="btn btn-warning" onclick="getLastData()">Copy</button></td>
                </tr>
              @endforeach
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


function increment() {
  var number = @json($count);
  var increment = (+number) + 1;
  increment = ("000" + increment).slice(-3);
  return increment;
}

function makeid(length) {
  var result           = '';
  var characters       = '0123456789';
  var charactersLength = characters.length;
  for ( var i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() *  charactersLength));
  }
  return result;
}

function getTicketNumber() {
  var today = new Date();
  var date = today.getFullYear() + '-' + ('0' + (today.getMonth()+1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
  var newDate = date.replace(/-/g, "");
  var nomor = newDate + increment();
  $('#ticket_number').val(nomor);
}

$(document).ready(function(){
  getTicketNumber();
})

function getLastData(){
  var lastSupplier = $('#lastSupplier').text();
  var lastPlate = $('#lastPlate').text();
  var lastProduct = $('#lastProduct').text();
  var lastWeight = $('#lastWeight').text();
  $('#supplier').val(lastSupplier);
  $('#plate').val(lastPlate);
  $('#first_weight').val(lastWeight);
}

function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
@endpush