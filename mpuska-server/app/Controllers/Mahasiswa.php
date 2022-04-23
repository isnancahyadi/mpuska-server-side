<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

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
        // $url = site_url('restapi/mahasiswa');
        // $data = [];
        // $response['mahasiswa'] = akses_restapi('POST', $url, $data);
        // echo json_encode($response);
        // $get = json_encode($response);
        return view('mahasiswa/new');
    }

    public function store()
    {
        $validate = $this->validate([
            'nim' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'NIM tidak boleh kosong!'
                ],
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong!'
                ],
            ],
            'nama_tim' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama tim tidak boleh kosong!'
                ],
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/mahasiswa');
        akses_restapi('POST', $url, $data);

        return redirect()->to(site_url('mahasiswa/tampil'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $this->mhs = new MahasiswaModel();
            $data['mahasiswa'] = $this->mhs->getSpecified($id);

            if ($this->mhs->affectedRows() > 0) {
                return view('mahasiswa/edit', $data);
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
            'nim' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'NIM tidak boleh kosong!'
                ],
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong!'
                ],
            ],
            'nama_tim' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama tim tidak boleh kosong!'
                ],
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $url = site_url('restapi/mahasiswa/' . $id);
        akses_restapi('PUT', $url, $data);

        return redirect()->to(site_url('mahasiswa/tampil'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        //$data = $this->request->getPost();
        $url = site_url('restapi/mahasiswa/' . $id);
        akses_restapi('DELETE', $url, $id);
        return redirect()->to(site_url('mahasiswa/tampil'))->with('success', 'Data Berhasil Dihapus');
    }
}
