<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    
    protected $table = 'barangs';

    
    protected $primaryKey = 'id_barang';

    
    public $timestamps = true;

    
    protected $fillable = [
        'nama_barang',
        'merek',
        'harga',
        'stok',
        'satuan'
    ];

    
}

