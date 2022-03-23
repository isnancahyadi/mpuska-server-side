<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;
use App\Models\MatakuliahModel;

class Pengampu extends BaseController
{
    function __construct()
    {
        helper(['restclient']);

        $this->dosen = new DosenModel();
        $this->matkul = new MatakuliahModel();
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

    public function add()
    {
        $data['dosen'] = $this->dosen->getAll();
        $data['matkul'] = $this->matkul->getAll();

        return view('pengampu/new', $data);
    }
}
