<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProdukModel;
use App\Models\TokoModel;

class Generate extends BaseController
{
    public function __construct()
    {
        $this->usermodel        = new UsersModel();
        $this->produkmodel      = new ProdukModel();
        $this->tokomodel        = new TokoModel();
        $this->fake             = \Faker\Factory::create('id_ID');
    }

    public function generate_user()
    {
        $faker      = $this->fake;
    }

    public function generate_toko()
    {
        $faker      = $this->fake;
        $user       = $this->usermodel->findAll();
        $randarray = array_rand($user);
        $iduser = $user[$randarray]["id_user"];
        $kode_toko        = 'TOKO-' . strtoupper($faker->randomLetter()) . $faker->randomNumber(2, true) . strtoupper($faker->randomLetter()) . $faker->randomNumber(1, true); 
        $savetoko = $this->tokomodel->save([
            'nama_toko' => $faker->streetName(),
            'pemilik_toko' => $faker->randomNumber(5, true),
            'kode_toko' => $kode_toko,
            'user_id'   => number_format($iduser)
        ]);
        var_dump($savetoko);
        die;
        return redirect()->to('/toko/daftar-toko');
    }

    public function generate_produk()
    {
        $faker      = $this->fake;
        for ($i=0; $i < 25; $i++) { 
            $toko       = $this->tokomodel->findAll();
            $kode_produk        = 'PRODUK-' . strtoupper($faker->randomLetter()) . $faker->randomNumber(2, true) . strtoupper($faker->randomLetter()) . $faker->randomNumber(1, true); 
            $randomgambarproduk     = [
                '1'=>'produk1.jpg',
                '2'=>'produk2.jpg',
                '3'=>'produk3.jpg',
                '4'=>'produk4.jpg',
                '5'=>'produk5.jpg'
            ];
            $key = array_rand($randomgambarproduk);
            $gambar_produk = $randomgambarproduk[$key];
            $randarray = array_rand($toko);
            $idtoko = $toko[$randarray]["id_toko"];
            $saveproduk = $this->produkmodel->save([
                'nama_produk' => $faker->streetName(),
                'harga_produk' => $faker->randomNumber(5, true),
                'gambar_produk' => $gambar_produk,
                'kode_produk' => $kode_produk,
                'toko_id'   => $idtoko
            ]);
        }
        return redirect()->to('/produk/daftar-produk');
    }
}
