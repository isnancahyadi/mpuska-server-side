<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Capaian extends BaseController
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
        $url = site_url('restapi/capaian');
        $data = [];
        $response['cpl'] = akses_restapi('GET', $url, $data);

        return view('pencapaian/index', (array)$response);
    }

    public function add()
    {
        return view('pencapaian/new');
    }
}
