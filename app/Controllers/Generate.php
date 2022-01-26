<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProdukModel;
use App\Models\TokoModel;

class Generate extends BaseController
{
    public function __construct()
    {
        $this->usermodel    = new UsersModel();
        $this->usermodel    = new ProdukModel();
        $this->usermodel    = new TokoModel();
        $this->faker        = \Faker\Factory::create('id_ID');
    }

    public function generate_produk()
    {
        $testtt = $faker->phoneNumber();
        var_dump($testtt);
        die;
    }
}
