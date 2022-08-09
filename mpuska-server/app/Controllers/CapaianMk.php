<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CapaianModel;
use App\Models\MatakuliahModel;

class CapaianMk extends BaseController
{
    function __construct()
    {
        helper(['restclient']);

        $this->cpl = new CapaianModel();
        $this->matkul = new MatakuliahModel();
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

    public function add()
    {
        $data['cpl'] = $this->cpl->getAll();
        $data['matkul'] = $this->matkul->getAll();

        return view('pencapaian/matakuliah/new', $data);
    }
}
