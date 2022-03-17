<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Matakuliah extends BaseController
{
    function __construct()
    {
        helper(['restclient']);
    }

    public function index()
    {
        //
    }

    public function tampil()
    {
        $url = site_url('restapi/matakuliah');
        $data = [];
        $response['matkul'] = akses_restapi('GET', $url, $data);

        return view('matakuliah/index', (array)$response);
    }

    public function add()
    {
        return view('matakuliah/new');
    }
}
