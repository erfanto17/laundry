<?php

namespace App\Http\Controllers;
use App\log;
use App\User;
use App\Outlet;
use App\Paket;
use App\Member;
use App\Transaksi;
use Illuminate\Http\Request;

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
        $users = User::count();
        $member = Member::count();
        $paket = Paket::count();
        $transaksi =Transaksi::count();

        

        $widget = [
            'users' => $users,
            'member' => $member,
            'paket' => $paket,
            'transaksi' => $transaksi
            //...
        ];
        $transaksiPaid = Transaksi::where('dibayar','dibayar')->get()
;
        return view('home', compact('widget'),[
            'transaksiPaid'=>$transaksiPaid,
            'user' => user::orderBy('id','desc')->get(),
            'outlet' => outlet::orderBy('id','desc')->get(),
            'paket' => paket::orderBy('id','desc')->get(),
            'member' => member::orderBy('id','desc')->get(),
            'transaksi' => transaksi::orderBy('id','desc')->get(),
            'log' => log::orderBy('id','desc')->get(),

        

            
        ]);

        
    }

    
}


