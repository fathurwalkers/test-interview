<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\TokoModel;
use App\Models\ProdukModel;

class Toko extends BaseController
{
    public function __construct()
    {
        $this->produkmodel      = new ProdukModel();
        $this->usermodel        = new UsersModel();
        $this->tokomodel        = new TokoModel();
        $this->fake             = \Faker\Factory::create('id_ID');
    }

    public function daftar_toko()
    {
        $toko = $this->tokomodel->findAll();
        $user   = $this->usermodel;
        return view('dashboard/daftar-toko', [
            'toko' => $toko,
            'user' => $user
        ]);
    }

    public function tambah_toko()
    {
        $session = session('username');
        $user   = $this->usermodel->where('username', $session)->first();
        return view('dashboard/tambah-toko', [
            'user' => $user
        ]);
    }

    public function post_tambah_toko()
    {
        $faker                  = $this->fake;
        $session                = session('username');
        $user                   = $this->usermodel->where('username', $session)->first();
        // var_dump($user["id_user"]);
        // die;
        $user_id = $user["id_user"];
        $kode_toko              = 'TOKO-' . strtoupper($faker->randomLetter()) . $faker->randomNumber(2, true) . strtoupper($faker->randomLetter()) . $faker->randomNumber(1, true); 
        $this->tokomodel->save([
            'nama_toko'         => $this->request->getVar('nama_toko'),
            'pemilik_toko'      => $user["nama"],
            'kode_toko'         => $kode_toko,
            'user_id'           => $user_id
        ]);
        return redirect()->to('/toko/daftar-toko');
    }

    public function edit_toko($id)
    {
        $toko = $this->tokomodel->where('id_toko', $id)->first();
        return view('dashboard/edit-toko', [
            'toko' => $toko
        ]);
    }

    public function update_toko($id)
    {
        $toko = $this->tokomodel->where('id_toko', $id)->first();
        $this->tokomodel->where('id_toko', $toko["id_toko"])->set([
            'nama_toko'         => $this->request->getVar('nama_toko'),
        ])->update();
        return redirect()->to('/toko/daftar-toko');
    }

    public function hapus_toko($id)
    {
        $toko = $this->tokomodel->where('id_toko', $id)->delete();
        return redirect()->to('/toko/daftar-toko');
    }
}
