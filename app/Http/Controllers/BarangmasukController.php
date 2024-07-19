<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = Barangmasuk::all();
        $barang = Barang::all();
        return view('admin.barangmasuk.index', compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangmasuk = Barangmasuk::all();
        $barang = Barang::all();

        return view('admin.barangmasuk.create', compact('barangmasuk', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'barang_id' => 'required',
        //     'tanggal_masuk' => 'required',
        //     'jumlah' => 'required',
        //     'keterangan' => 'required',
        // ]);

        $barangmasuk = new Barangmasuk();
        $barangmasuk->barang_id = $request->barang_id;
        $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->keterangan = $request->keterangan;
       
        $barang = Barang::find($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        $barangmasuk->save();
        Alert::success('Success', 'Data Behasil Ditambahkan')->autoClose(1000);

        return redirect()->route('barangmasuk.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barangmasuk $barangmasuk)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);
        $barang = Barang::all();
        return view('admin.barangmasuk.edit', compact('barangmasuk', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'tanggal_masuk' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $barangmasuk = Barangmasuk::findOrFail($id);
        $barang = $barangmasuk->barang;
        $barang->stok = $barang->stok - $barangmasuk->jumlah + $request->jumlah;
        $barang->save();

        $barangmasuk->update($request->all());
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);
        $barang = $barangmasuk->barang;
        $barang->stok -= $barangmasuk->jumlah;
        $barang->save();

        $barangmasuk->delete();
        // Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('barangmasuk.index');

    }
}
