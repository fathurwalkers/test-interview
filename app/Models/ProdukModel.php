<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';

    protected $returnType     = 'array';

    protected $allowedFields = [
        'nama_produk',
        'harga_produk',
        'gambar_produk',
        'kode_produk',
        'toko_id'
    ];

    protected $useTimestamps = false;
}