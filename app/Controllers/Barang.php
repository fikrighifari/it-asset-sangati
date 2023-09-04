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
        $model = new Barang_model;
        $data = array(
            'nama_barang' => $this->request->getPost('nama'),
            'qty'         => $this->request->getPost('qty'),
            'harga_beli'  => $this->request->getPost('beli'),
            'harga_jual'  => $this->request->getPost('jual')
        );
        $model->saveBarang($data);
        echo '<script>
                alert("Sukses Tambah Data Barang");
                window.location="' . base_url('barang') . '"
            </script>';
    }

    public function edit($id)
    {
        $model = new Barang_model;
        $getBarang = $model->getBarang($id)->getRow();
        if (isset($getBarang)) {
            $data['barang'] = $getBarang;
            $data['title'] = 'Edit ' . $getBarang->nama_barang;
            echo view('header_view', $data);
            echo view('edit_view', $data);
            echo view('footer_view', $data);
        } else {
            echo '<script>alert("ID Barang ' . $id . ' Tidak ditemukan");
            window.location= "' . base_url('barang') . ' "
             </script>';
        }
    }

    public function update()
    {
        $model = new Barang_model;
        $id = $this->request->getPost('id_barang');
        $data = array(
            'nama_barang' => $this->request->getPost(('nama')),
            'qty' => $this->request->getPost(('qty')),
            'harga_beli' => $this->request->getPost(('beli')),
            'harga_jual' => $this->request->getPost(('jual')),
        );
        $model->editBarang($data, $id);
        echo '<script>alert("Sukses edit barang.");
        window.location = "' . base_url('barang') . '  ";
        </script>';
    }
}
