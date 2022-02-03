<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mahasiswa extends BaseController
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
        $url = site_url('restapi/mahasiswa');
        $data = [];
        $response['mahasiswa'] = akses_restapi('GET', $url, $data);
        // echo json_encode($response);
        // $get = json_encode($response);
        return view('mahasiswa/index', (array)$response);
    }

    public function add()
    {
        $url = site_url('restapi/mahasiswa');
        $data = [];
        $response['mahasiswa'] = akses_restapi('POST', $url, $data);
        // echo json_encode($response);
        // $get = json_encode($response);
        return view('mahasiswa/new', (array)$response);
    }
}
