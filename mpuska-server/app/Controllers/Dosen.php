<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dosen extends BaseController
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
        $url = site_url('restapi/dosen');
        $data = [];
        $response['dosen'] = akses_restapi('GET', $url, $data);
        // echo json_encode($response);
        // $get = json_encode($response);
        return view('dosen/index', (array)$response);
    }
}
