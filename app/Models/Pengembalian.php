<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $fillable = [
        'id',
        'barang_id',
        'nama_peminjam',
        'tanggal_pengembalian',
        'jumlah',
        'status'

    ];
    public $timestamps = true;
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
