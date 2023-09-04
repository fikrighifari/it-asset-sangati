<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Barang_model;
use App\Controllers\BaseController;
class Barang extends BaseController
{
    public function index()
    {
        $model = new Barang_model;
        $data['title']     = 'Data Barang';
        $data['getBarang'] = $model->getBarang();
        echo view('barang/header_view', $data);
        echo view('barang/barang_view', $data);
        echo view('barang/footer_view', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Barang';
        echo view('barang/header_view', $data);
        echo view('barang/tambah_view', $data);
        echo view('barang/footer_view', $data);
    }


    public function add()
    {
        $request = \Config\Services::request();
        $model = new Barang_model;
        // dd($request->getPost());
        $data = array(
            'nama_barang' => $this->request->getPost(),
        );
        $model->saveBarang($data);
        echo '<script>
                alert("Sukses Tambah Data Barang");
                window.location="' . base_url('barang') . '"
            </script>';
    }
}
