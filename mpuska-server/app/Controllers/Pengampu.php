<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pengampu extends BaseController
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
        $url = site_url('restapi/pengampu');
        $data = [];
        $response['pengampu'] = akses_restapi('GET', $url, $data);

        return view('pengampu/index', (array)$response);
    }
}
