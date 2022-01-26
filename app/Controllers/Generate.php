<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProdukModel;
use App\Models\TokoModel;

class Generate extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new UsersModel();
        $this->usermodel = new ProdukModel();
        $this->usermodel = new TokoModel();
    }

    public function generate_produk()
    {
        // 
    }
}
