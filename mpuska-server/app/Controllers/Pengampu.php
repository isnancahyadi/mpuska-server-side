<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;
use App\Models\MatakuliahModel;
use App\Models\PengampuModel;

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

    public function store()
    {
        $validate = $this->validate([
            'niy' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIY tidak boleh kosong'
                ],
            ],
            'kode_matkul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode matakuliah tidak boleh kosong'
                ],
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas tidak boleh kosong'
                ],
            ],
            'thn_ajaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun ajaran tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/pengampu');
        akses_restapi('POST', $url, $data);

        return redirect()->to(site_url('pengampu/tampil'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $this->pengampu = new PengampuModel();
            $data['dosen'] = $this->dosen->getAll();
            $data['matkul'] = $this->matkul->getAll();
            $data['pengampu'] = $this->pengampu->getSpecified($id);

            if ($this->pengampu->affectedRows() > 0) {
                return view('pengampu/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'kode_matkul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode matakuliah tidak boleh kosong'
                ],
            ],
            'niy' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIY tidak boleh kosong'
                ],
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas tidak boleh kosong'
                ],
            ],
            'thn_ajaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun ajaran tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/pengampu/' . $id);
        akses_restapi('PUT', $url, $data);

        return redirect()->to(site_url('pengampu/tampil'))->with('success', 'Data Berhasil Diupdate');
    }
}
