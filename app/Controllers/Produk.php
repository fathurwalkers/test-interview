<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UsersModel;
use App\Models\TokoModel;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->produkmodel      = new ProdukModel();
        $this->usermodel        = new UsersModel();
        $this->tokomodel        = new TokoModel();
        $this->fake             = \Faker\Factory::create('id_ID');
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

    public function tambah_produk()
    {
        $session = session('username');
        $user   = $this->usermodel->where('username', $session)->first();
        $toko   = $this->tokomodel->where('user_id', $user["id_user"])->first();
        if ($toko == NULL) {
            return redirect()->to('/produk/daftar-produk');
        } else {
            return view('dashboard/tambah-produk');
        }
    }

    public function post_tambah_produk()
    {
        $faker  = $this->fake;
        $session = session('username');
        $user   = $this->usermodel->where('username', $session)->first();
        $toko   = $this->tokomodel->where('user_id', $user["id_user"])->first();
        $kode_produk = 'PRODUK-' . strtoupper($faker->randomLetter()) . $faker->randomNumber(2, true) . strtoupper($faker->randomLetter()) . $faker->randomNumber(1, true); 
        $gambar = $this->request->getFile('gambar_produk');
        $namabaru = $gambar->getRandomName();
        $path = $this->request->getFile('gambar_produk')->move('img/produk/', $namabaru);
        $this->produkmodel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_produk' => strval($this->request->getVar('harga_produk')),
            'gambar_produk' => $namabaru,
            'kode_produk' => strval($kode_produk),
            'toko_id'       => intval($toko["id_toko"])
        ]);
        return redirect()->to('/produk/daftar-produk');
    }

    public function edit_produk($id)
    {
        $produk = $this->produkmodel->where('id_produk', $id)->first();
        return view('dashboard/edit-produk', [
            'produk' => $produk
        ]);
    }
}
