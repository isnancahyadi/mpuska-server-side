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

    public function store()
    {
        $validate = $this->validate([
            'cpl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'CPL tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/capaian');
        akses_restapi('POST', $url, $data);

        return redirect()->to(site_url('capaian/tampil'))->with('success', 'Data Berhasil Disimpan');
    }
}
