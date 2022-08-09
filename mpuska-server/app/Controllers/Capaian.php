<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CapaianModel;

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

    public function edit($id = null)
    {
        if ($id != null) {
            $this->cpl = new CapaianModel();
            $data['cpl'] = $this->cpl->getSpecified($id);

            if ($this->cpl->affectedRows() > 0) {
                return view('pencapaian/edit', $data);
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
        $url = site_url('restapi/capaian/' . $id);
        akses_restapi('PUT', $url, $data);

        return redirect()->to(site_url('capaian/tampil'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $url = site_url('restapi/capaian/' . $id);
        akses_restapi('DELETE', $url, $id);
        return redirect()->to(site_url('capaian/tampil'))->with('success', 'Data Berhasil Dihapus');
    }
}
