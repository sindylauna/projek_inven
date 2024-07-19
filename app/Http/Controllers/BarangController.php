<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        confirmDelete('Hapus!','Anda Yakin Ingin Menghapusnya?');
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.barang.create');
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
            'nama_barang' => 'required',
            'stok' => 'required',
            


        ]);
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request-> stok;
        $barang->save();

        Alert::success('Succes','Data Berhasil Ditambahkan')->autoClose(1000);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'nullable|integer',
        ]);
        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->save();
        Alert::success('Succes', 'Data Berhasil Diubah')->autoClose(1000);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::FindOrFail($id);
        $barang->delete();
        Alert::success('Succes', 'Data Berhasil Dihapus')->autoClose(1000);
        return redirect()->route('barang.index');
    }
}
