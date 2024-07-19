<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $fillable = [
        'id',
        'barang_id',
        'nama_peminjam',
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah',
        'status'

    ];
    public $timestamps = true;
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
