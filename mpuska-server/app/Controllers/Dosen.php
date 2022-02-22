<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;

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

    public function add()
    {
        // $url = site_url('restapi/mahasiswa');
        // $data = [];
        // $response['mahasiswa'] = akses_restapi('POST', $url, $data);
        // echo json_encode($response);
        // $get = json_encode($response);
        return view('dosen/new');
    }

    public function store()
    {
        $validate = $this->validate([
            'niy' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'NIY tidak boleh kosong!'
                ],
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong!'
                ],
            ],
            'tgl_lahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong!'
                ],
            ],
            'tempat_lahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tempat lahir tidak boleh kosong!'
                ],
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ],
            ],
            'kecamatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kecamatan tidak boleh kosong!'
                ],
            ],
            'kabupaten' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kabupaten tidak boleh kosong!'
                ],
            ],
            'provinsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Provinsi tidak boleh kosong!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/dosen');
        akses_restapi('POST', $url, $data);

        return redirect()->to(site_url('dosen/tampil'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $this->dos = new DosenModel();
            $data['dosen'] = $this->dos->getSpecified($id);

            if ($this->dos->affectedRows() > 0) {
                return view('dosen/edit', $data);
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
            'niy' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'NIY tidak boleh kosong!'
                ],
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong!'
                ],
            ],
            'tgl_lahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong!'
                ],
            ],
            'tempat_lahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tempat lahir tidak boleh kosong!'
                ],
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ],
            ],
            'kecamatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kecamatan tidak boleh kosong!'
                ],
            ],
            'kabupaten' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kabupaten tidak boleh kosong!'
                ],
            ],
            'provinsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Provinsi tidak boleh kosong!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/dosen/' . $id);
        akses_restapi('PUT', $url, $data);

        return redirect()->to(site_url('dosen/tampil'))->with('success', 'Data Berhasil Diupdate');
    }
}
