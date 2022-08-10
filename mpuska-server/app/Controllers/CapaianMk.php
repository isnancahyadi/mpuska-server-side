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

    public function store()
    {
        $validate = $this->validate([
            'kode_matkul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode matakuliah tidak boleh kosong'
                ],
            ],
            'ID_cpl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'CPL tidak boleh kosong'
                ],
            ],
            'cpmk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'CPMK tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();

        // $cpl = [
        //     'kode_matkul' => $data['kode_matkul'],
        //     'cpl' => $data['ID_cpl']
        // ];

        // $cpmk = [
        //     'kode_matkul' => $data['kode_matkul'],
        //     'cpmk' => $data['ID_cpmk']
        // ];

        $url = site_url('restapi/capaianmk');
        akses_restapi('POST', $url, $data);

        return redirect()->to(site_url('capaianmk/tampil'))->with('success', 'Data Berhasil Disimpan');
        //var_dump($data['cpmk']);
    }
}
