<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CapaianMk extends BaseController
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
        $url = site_url('restapi/capaianmk');
        $data = [];
        $response['cpmk'] = akses_restapi('GET', $url, $data);

        return view('pencapaian/matakuliah/index', (array)$response);
    }
}
