<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'id',
        'nama_barang',
        'stok',
    ];
    public $timestamps = true;
    public function barangmasuk(){
        return $this->hasMany(Barangmasuk::class);
    }
    public function barangkeluar()
    {
        return $this->hasMany(Barangkeluar::class);
    }
    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
   
}
