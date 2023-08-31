<?php

namespace App\Controllers;

use App\Models\Barang_model;
use CodeIgniter\Controller;

class Barang extends Controller
{

    public function index($request)
    {
        $model = new Barang_model();
        $data['title'] = 'Data Barang';
        $data['getBarang'] = $model->getBarang();
        echo view('header_view', $data);
        echo view('barang_view', $data);
        echo view('footer_view', $data);

    }
}
