<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\TokoModel;

class Toko extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new UsersModel();
        $this->tokomodel = new TokoModel();
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
}
