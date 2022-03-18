<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MatakuliahModel;

class Matakuliah extends BaseController
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
        $url = site_url('restapi/matakuliah');
        $data = [];
        $response['matkul'] = akses_restapi('GET', $url, $data);

        return view('matakuliah/index', (array)$response);
    }

    public function add()
    {
        return view('matakuliah/new');
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
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama matakuliah tidak boleh kosong'
                ],
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester tidak boleh kosong'
                ],
            ],
            'sks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SKS tidak boleh kosong'
                ],
            ],
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Program studi tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/matakuliah');
        akses_restapi('POST', $url, $data);

        return redirect()->to(site_url('matakuliah/tampil'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $this->matkul = new MatakuliahModel();
            $data['matkul'] = $this->matkul->getSpecified($id);

            if ($this->matkul->affectedRows() > 0) {
                return view('matakuliah/edit', $data);
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
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama matakuliah tidak boleh kosong'
                ],
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester tidak boleh kosong'
                ],
            ],
            'sks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SKS tidak boleh kosong'
                ],
            ],
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Program studi tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/matakuliah/' . $id);
        akses_restapi('PUT', $url, $data);

        return redirect()->to(site_url('matakuliah/tampil'))->with('success', 'Data Berhasil Diupdate');
    }
}
