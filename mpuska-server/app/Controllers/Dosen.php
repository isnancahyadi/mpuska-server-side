<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\RequestInterface;

class Dosen extends BaseController
{
    use ResponseTrait;
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
            'niy_nip' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'NIY/NIP tidak boleh kosong!'
                ],
            ],
            'nama_depan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama depan tidak boleh kosong!'
                ],
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong!'
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
            'niy_nip' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'NIY/NIP tidak boleh kosong!'
                ],
            ],
            'nama_depan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama depan tidak boleh kosong!'
                ],
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong!'
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
        $url = site_url('restapi/dosen/' . $id);
        akses_restapi('PUT', $url, $data);

        return redirect()->to(site_url('dosen/tampil'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        //$data = $this->request->getPost();
        $url = site_url('restapi/dosen/' . $id);
        akses_restapi('DELETE', $url, $id);
        return redirect()->to(site_url('dosen/tampil'))->with('success', 'Data Berhasil Dihapus');
    }

    public function changeStatus()
    {
        if ($this->request->isAJAX()) {
            $niy_nip = $this->request->getVar('niy_nip');
            $status_mbkm = $this->request->getVar('status_mbkm');

            $data = [
                'status_mbkm' => $status_mbkm
            ];

            $this->db->table('dosen')->where('niy_nip', $niy_nip)->update($data);
        }
    }
}
