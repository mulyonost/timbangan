<?php

namespace App\Http\Controllers;

use App\Models\Weighing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WeighingController extends Controller
{
    public function index()
    {
        $unfinished = Weighing::where('status', 0)->get();
        $count = Weighing::where('created_at', '>=', Carbon::today())->count();
        $last = Weighing::orderBy('id', 'desc')->where('status', 1)->take(1)->get();
        return view('home', compact('unfinished', 'count', 'last'));
    }

    public function store(Request $request)
    {
        $weight = new Weighing;
        $weight->ticket_number = $request->ticket_number;
        $weight->supplier = $request->supplier;
        $weight->product = $request->product;
        $weight->plate = $request->plate;
        $weight->first_weight_time = Carbon::now();
        $weight->first_weight = $request->first_weight;
        $weight->status = 0;
        // $img_path = public_path("uploads/");
        // file_put_contents($img_path, "http://36.72.70.120:81/image/Gdg?time=1639919929050&session=32244da2145f00b849ff740f55db4dfd&decode=1&w=99999&q=85");
        $weight->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $weight = Weighing::find($id);
        $unfinished = Weighing::where('status', 0)->get();

        return view('edit', compact('weight', 'unfinished'));
    }

    public function update(Request $request, $id)
    {
        $weight = Weighing::find($id);
        $weight->plate = $request->plate;
        $weight->second_weight = $request->second_weight;
        $weight->second_weight_time = Carbon::now();
        $weight->nett_weight = $request->nett_weight;
        $weight->status = 1;
        $weight->update();

        session(['print_id' => $id]);

        return redirect('/selesai');
    }

    public function selesai()
    {
        return view('selesai');
    }

    public function cetak()
    {
        $id = session('print_id');
        $data = Weighing::find($id);

        return view('cetak', compact('data'));
    }

    public function cetakulang($id)
    {
        $data = Weighing::find($id);
        return view('cetak', compact('data'));
    }

    public function data()
    {
        $data = Weighing::orderBy('id', 'desc')->get();
        return view('data', compact('data'));
    }
}
