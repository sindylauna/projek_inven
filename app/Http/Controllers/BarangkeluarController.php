<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Barang;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = Barangkeluar::latest()->get();
        // $barang = Barang::all();
        confirmDelete('Hapus!', 'Anda Yakin Ingin Menghapusnya?');
        return view('admin.barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangkeluar = Barangkeluar::all();
        $barang = Barang::all();
        return view('admin.barangkeluar.create', compact('barangkeluar', 'barang'));
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
            'tanggal_keluar' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $barangkeluar = new Barangkeluar();
        $barangkeluar->barang_id = $request->barang_id;
        $barangkeluar->tanggal_keluar = $request->tanggal_keluar;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->keterangan = $request->keterangan;

        $barang = Barang::find($request->barang_id);
        $barang->stok -= $request->jumlah;
        $barang->save();
        $barangkeluar->save();
        Alert::success('Succes', 'Data Berhasil Ditambahkan')->autoClose(1000);
        return redirect()->route('barangkeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangkeluar = Barangkeluar::findOrFail($id);
        $barang = Barang::all();
        return view('admin.barangkeluar.edit', compact('barangkeluar', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'tanggal_keluar' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $barangkeluar = Barangkeluar::findOrFail($id);
        $barang = $barangkeluar->barang;
        // $barang->stok = $barang->stok - $barangkeluar->jumlah + $request->jumlah;
        // $barang->save();
        $barangkeluar->update($request->all());
        Alert::success('Succes', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('barangkeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = Barangkeluar::findOrFail($id);
        $barang = $barangkeluar->barang;
        $barang->stok -= $barangkeluar->jumlah;
        $barang->save();

        $barangkeluar->delete();
        Alert::success('Success', 'Data Behasil DiHapus')->autoClose(1000);
        return redirect()->route('barangkeluar.index');
    }
}
