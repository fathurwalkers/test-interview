<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new ProdukModel();
    }

    public function daftar_produk()
    {
        return view('dashboard/daftar-produk');
    }
}
