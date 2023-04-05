<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\TransaksiDetail;
use Illuminate\Support\Carbon;
use PDF;

class notaController extends Controller
{
    public function index($kode)
    {
        $transaksi = Transaksi::where('kode_invoice',$kode)->first();
        // $pdf = PDF::loadView('nota_transaksi', [
        //     'transaksi' => $transaksi,
        //     'detail' => detail_transaksi::where('id_transaksi',$transaksi->id)->get(),
        // ]);
        // return $pdf->download('invoice.pdf');
        return view('nota_transaksi',[
            'transaksi' => $transaksi,
            'detail' => TransaksiDetail::where('id_transaksi',$transaksi->id)->get(),
        ]);
    }
}
