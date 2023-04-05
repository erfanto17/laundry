<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\log_transaksi;

class landingController extends Controller
{
    public function cekstatus(Request $req)
    {
    

        $log = log_transaksi::where('kode_invoice',$transaksi->kode_invoice)->get();
        foreach($log as $item)
        {
            $tbody .= '<tr>
            <td>'.$i.'</td>
            <td>'.$item->status.'</td>
            <td>'.$item->created_at->isoFormat('dddd, D MMMM Y').'</td>
        </tr>';
        $i++;
        }

       return response()->json(['info' => $info_transaksi,'thead'=>$thead,'tbody'=>$tbody,'title'=>$title]);
    }
}
