<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    protected $fillable = [
        'id',
        'barang_id',
        'tanggal_keluar',
        'jumlah',
        'keterangan'

    ];
    public $timestamps = true;
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
