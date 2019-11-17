<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Transaksi;
use App\Fasilitastransaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->priv_admin != 'admin') {
            return redirect('/new/transaksi');
        }
        //card 1
        $data['jumlah_admin'] = User::where('priv_admin','admin')->count();
        $data['jumlah_transaksi'] = Transaksi::count();
        $data['jumlah_masuk'] = Transaksi::sum('total');
        $data['jumlah_user'] = User::count();
        //card 3
        $data['transaksi'] = Transaksi::limit(4)->get();
        //card 5
        $data['ft'] = Fasilitastransaksi::distinct('id_fasilitas')->get();
        $data['data'] = Fasilitastransaksi::all();
        $data['total_all_fasilitas'] = 0;
        $data['total_all_fasilitas_harga'] = 0;
        foreach ($data['ft'] as $key => $value) {
            $data['sum_fasilitas'][$value->id_fasilitas] = 0;
            $data['sum_fasilitas_harga'][$value->id_fasilitas] = 0;
            $data['total_all_fasilitas'] += $data['data'][$key]->jumlah;
            $data['total_all_fasilitas_harga'] += $data['data'][$key]->fasilitas->harga*$data['data'][$key]->jumlah;
        }
        foreach ($data['data'] as $key => $value) {
            $data['sum_fasilitas'][$value->id_fasilitas] += $value->jumlah;
            $data['sum_fasilitas_harga'][$value->id_fasilitas] += $value->fasilitas->harga*$value->jumlah;
        }
        return view('home', $data);
    }
}
