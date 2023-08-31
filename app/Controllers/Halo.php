<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Halo extends Controller {
    public function index()
    {
        $data['title'] = 'Hello World!';
        $data['msg'] = 'Welcome to CI 4';
        return view('halo_view', $data);
    }

}