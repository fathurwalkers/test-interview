<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\TokoModel;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->produkmodel = new ProdukModel();
        $this->tokomodel = new TokoModel();
    }

    public function daftar_produk()
    {
        $produk = $this->produkmodel->findAll();
        $toko   = $this->tokomodel;
        return view('dashboard/daftar-produk', [
            'produk' => $produk,
            'toko' => $toko
        ]);
    }

    public function hapus_produk($id)
    {
        $produk = $this->produkmodel->where('id_produk', $id)->delete();
        return redirect()->to('/produk/daftar-produk');
    }
}
