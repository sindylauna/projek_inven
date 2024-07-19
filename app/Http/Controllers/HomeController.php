<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\Pinjaman;
use App\Models\Pengembalian;


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
        $barang = Barang::count('id');
        $barangmasuk = Barangmasuk::count('id');
        $barangkeluar = Barangkeluar::count('id');
        $pinjaman = Pinjaman::count('id');
        $pengembalian = Pengembalian::count('id');


        return view('home', compact('barang', 'barangmasuk', 'barangkeluar','pinjaman','pengembalian'));

    }
}
