<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table      = 'toko';
    protected $primaryKey = 'id_toko';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nama_toko', 'pemilik_toko', 'kode_toko', 'user_id'];

    protected $useTimestamps = false;
}