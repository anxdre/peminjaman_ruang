<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Fasilitas;
use App\Fasilitastransaksi;
use App\Mail\TransaksiMail;
use App\Ruang;
use App\Transaksi;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MasterController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function ruang()
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $this->data['ruangs'] = Ruang::paginate(15);
            return view('master_ruang', $this->data);
        }
    }

    function saveEditFasil(Request $request)
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $this->validate($request, [
                'id' => 'required',
                'nama' => 'required',
                'harga' => 'required',
                'jumlah' => 'required'
            ], [
                'nama.required' => 'Nama tidak boleh kosong',
                'harga.required' => 'Harga tidak boleh kosong',
                'jumlah.required' => 'Jumlah tidak boleh kosong'
            ]);
            $fasil = Fasilitas::find($request->id);
            $fasil->nama = $request->nama;
            $fasil->harga = $request->harga;
            $fasil->jumlah = $request->jumlah;
            $fasil->save();
            return redirect('/master/fasilitas');
        }

    }

    function saveEditRuang(Request $request)
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $this->validate($request, [
                'id' => 'required',
                'nama' => 'required',
                'harga' => 'required',
                'desc' => 'required'
            ], [
                'nama.required' => 'Nama tidak boleh kosong',
                'harga.required' => 'Harga tidak boleh kosong',
                'desc.required' => 'Deskripsi tidak boleh kosong'
            ]);
            $ruang = Ruang::find($request->id);

            $file       = $request->file('gambar');
            if ($file == "") {
                $ruang->gambar = $ruang->gambar;
            }else{
                $fileName   = "RUANG_".$file->getClientOriginalName();
                $request->file('gambar')->move("image/ruang/", $fileName);
                $ruang->gambar = $fileName;
            }

            $ruang->name = $request->nama;
            $ruang->harga = $request->harga;
            $ruang->desc = $request->desc;
            $ruang->save();
            return redirect('/master/ruang');
            // dd($ruang);
        }
    }

    function insertRuang(Request $request)
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $this->validate($request, [
                'nama' => 'required',
                'ukuran' => 'required',
                'kapasitas' => 'required',
                'warna' => 'required',
                'harga' => 'required',
                'desc' => 'required'
            ], [
                'nama.required' => 'Nama tidak boleh kosong',
                'ukuran.required' => 'Ukuran tidak boleh kosong',
                'kapasitas.required' => 'Kapasitas tidak boleh kosong',
                'warna.required' => 'Warna tidak boleh kosong',
                'harga.required' => 'Harga tidak boleh kosong',
                'desc.required' => 'Deskripsi tidak boleh kosong'
            ]);
            $ruang = new Ruang;

            $file       = $request->file('gambar');
            $fileName   = "RUANG_".$file->getClientOriginalName();
            $request->file('gambar')->move("image/ruang/", $fileName);

            $ruang->name = $request->nama;
            $ruang->ukuran = $request->ukuran;
            $ruang->kapasitas = $request->kapasitas;
            $ruang->warna = $request->warna;
            $ruang->harga = $request->harga;
            $ruang->desc = $request->desc;
            $ruang->gambar = $fileName;
            $ruang->save();

            return redirect('/master/ruang');
        }
    }

    function deleteRuang($id)
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $ruang = Ruang::find($id);
            $ruang->delete();
            return redirect()->back();
        }
    }

    function fasil()
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $this->data['fasils'] = Fasilitas::paginate(15);
            return view('master_fasil', $this->data);
        }
    }

    function insertFasil(Request $request)
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $this->validate($request, [
                'nama' => 'required',
                'harga' => 'required',
                'jumlah' => 'required'
            ], [
                'nama.required' => 'Nama tidak boleh kosong',
                'harga.required' => 'Harga tidak boleh kosong',
                'jumlah.required' => 'Jumlah tidak boleh kosong'
            ]);
            $fasil = new Fasilitas;
            $fasil->nama = $request->nama;
            $fasil->harga = $request->harga;
            $fasil->jumlah = $request->jumlah;
            $fasil->save();
            return redirect('/master/fasilitas');
        }
    }

    function deleteFasil($id)
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $fasil = Fasilitas::find($id);
            $fasil->delete();
            return redirect()->back();
        }
    }

    function trans()
    {
        $this->data['transaksis'] = Transaksi::orderBy('status', 'DESC')->paginate(15);
        return view('master_trans', $this->data);
    }

    function insertTrans(Request $request)
    {
        $this->validate($request, [
            'tgl' => 'required',
            'waktu' => 'required'
        ], [
            'tgl.required' => 'Tanggal pemesanan harus diisi',
            'waktu.required' => 'Waktu pemesanan haris diisi'
        ]);
        $dateArr = explode("/", $request->tgl);
        $ampm = explode(" ", $request->waktu);
        $time = explode(":", $request->waktu);
        if ($ampm[1] == "PM") {
            $jam = intval($time[0]) + 12;
        } else {
            $jam = $time[0];
        }
        $date = $dateArr[2] . "-" . $dateArr[0] . "-" . $dateArr[1] . " " . $jam . ":" . explode(" ", $time[1])[0] . ":00";

        $date_validate = Transaksi::all();

        foreach ($date_validate as $key => $value) {
            if ($value->tgl_waktu == $date) {
                return redirect('/new/transaksi')->with('error', 'Maaf, Ruangan tidak bisa dipinjam');
            }
        }

        $transaksi = new Transaksi;
        $transaksi->tgl_waktu = $date;
        $transaksi->id_user = Auth::user()->id;
        $transaksi->total = $request->total;
        $transaksi->id_ruang = $request->ruang;
        $transaksi->status = "PENDING";
        $transaksi->save();
        foreach (Cart::where('id_user', Auth::user()->id)->get() as $cart) {
            $item = new Fasilitastransaksi;
            $item->id_transaksi = $transaksi->id;
            $item->id_fasilitas = $cart->id_fasil;
            $item->jumlah = $cart->jumlah;
            $item->save();
            $cart->delete();
        }
        if (Auth::user()->priv_admin != 'admin') {
            return redirect('/new/transaksi')->with('success', 'Pesanan sedang diproses, tunggu balasan email dari kami :)');;
        } else {
            return redirect('/master/transaksi');
        }
    }

    function deleteTrans($id)
    {
        if (Auth::user()->priv_admin != 'admin') {
            return abort(404);
        } else {
            $transaksi = Transaksi::find($id);
            $transaksi->delete();
            $item = Fasilitastransaksi::where('id_transaksi', $id)->get();
            foreach ($item as $value) {
                $value->delete();
            }
            return redirect()->back();
        }
    }

    function formTransaksi()
    {
        $this->data['fasils'] = Fasilitas::all();
        $this->data['ruangs'] = Ruang::all();
        $this->data['carts'] = Cart::where('id_user', Auth::user()->id)->get();
        foreach ($this->data['fasils'] as $i => $f) {
            $fasil_min = Fasilitastransaksi::where('id_fasilitas', $f->id)->sum('jumlah');
            // dd($fasil_min);
            $this->data['fasils'][$i]->jumlah -= $fasil_min;
        }
        // dd($this->data['fasils']);
        return view('forms.formTransaksi', $this->data);
    }

    function saveCart(Request $request)
    {
        $exist = Cart::where([
            ['id_user', '=', Auth::id()],
            ['id_fasil', '=', $request->fasil]
        ])->first();
        if ($exist) {
            $exist->jumlah += $request->jumlah;
            $exist->save();
            echo 'sama';
        } else {
            $cart = new Cart;
            $cart->id_user = Auth::user()->id;
            $cart->id_fasil = $request->fasil;
            $cart->jumlah = $request->jumlah;
            $cart->save();
            echo 'beda';
        }
        // return redirect()->back();
    }

    function deleteCart($id)
    {
        Cart::find($id)->delete();
        echo json_encode("success");
    }

    function getInventory($bln, $tgl, $thn)
    {
        $transaksi = Transaksi::where("tgl_waktu", 'like', $thn . "-" . $bln . "-" . $tgl . '%')->get();
        $this->data['fasils'] = Fasilitas::all();
        foreach ($transaksi as $x => $y) {
            foreach ($this->data['fasils'] as $i => $f) {
                $this->data['fasils'][$i]->jumlah -= Fasilitastransaksi::where([
                    ['id_fasilitas', '=', $f->id],
                    ['id_transaksi', '=', $y->id]
                ])->sum('jumlah');
            }
        }
        echo json_encode($this->data['fasils']);
    }

    function getCart()
    {
        $cart = Cart::where('id_user', Auth::user()->id)->get();
        foreach ($cart as $value) {
            $value->fasil = Fasilitas::find($value->id_fasil);
        }
        echo json_encode($cart);
    }

    function confirm($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = "ACCEPTED";
        $transaksi->save();
        $this->mailInvo($id);
        return redirect('/master/transaksi');
    }

    function reject($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = "REJECTED";
        $transaksi->save();
        $this->mailInvo($id);
        return redirect('/master/transaksi');
    }

    function mailInvo($id)
    {
        $transaksi = Transaksi::find($id);
        Mail::to($transaksi->user->email)->send(new TransaksiMail($id));
    }
}
