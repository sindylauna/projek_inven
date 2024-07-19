<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pinjaman;
use Alert;

use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = Pinjaman::where('status', 'Dipinjam')->get();
        confirmDelete('Hapus!', 'Anda Yakin Ingin Menghapusnya?');

        return view('admin.peminjaman.index', compact('pinjaman'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjaman = Pinjaman::all();
        $barang = Barang::all();

        return view('admin.peminjaman.create', compact('pinjaman', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'jumlah' => 'required',
            // 'status' => 'required',
        ]);

        $pinjaman = new Pinjaman();
        $pinjaman->barang_id = $request->barang_id;
        $pinjaman->nama_peminjam = $request->nama_peminjam;
        $pinjaman->tgl_pinjam = $request->tgl_pinjam;
        $pinjaman->tgl_kembali = $request->tgl_kembali;
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->status = "Dipinjam";

        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            Alert::warning('Warning', 'Barang tidak mencukupi')->autoClose(1500);
            return redirect()->route('peminjaman.create');
        } else {
            $barang->stok -= $request->jumlah;
            $barang->save();
            $pinjaman->save();
            Alert::success('Success', 'Data Berhasil Dibuat.')->autoClose(1500);

            return redirect()->route('peminjaman.index');
        }

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $barang = Barang::all();
        return view('admin.peminjaman.edit', compact('pinjaman', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->barang_id = $request->barang_id;
        $pinjaman->tgl_pinjam = $request->tgl_pinjam;
        $pinjaman->nama_peminjam = $request->nama_peminjam;
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->status = $request->status;

        $barang = Barang::find($request->barang_id);
        if ($pinjaman->status = "Dikembalikan") {
            $barang->stok += $request->jumlah;
            $barang->save();
        }

        $pinjaman->save();

        // $barang = Barang::find($request->barang_id);
        // $barang->stok = $request->jumlah;
        // $barang->save();

        Alert::success('Success', 'Data Behasil Diubah')->autoClose(1000);
        return redirect()->route('peminjaman.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $barang = $pinjaman->barang;
        $barang->stok -= $pinjaman->jumlah;
        $barang->save();

        $pinjaman->delete();
        // Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('peminjaman.index');
    }
}
