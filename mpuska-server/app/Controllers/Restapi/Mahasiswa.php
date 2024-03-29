<?php

namespace App\Controllers\Restapi;

use App\Models\MahasiswaModel;
use App\Models\NamaMhsModel;
use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
    function __construct()
    {
        $this->mhs          = new MahasiswaModel();
        $this->namaMhs      = new NamaMhsModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->mhs->getAll();
        // return view('mahasiswa/index', $data);
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     * 
     * @return mixed
     */

    // Input data Mahasiswa
    public function create()
    {
        $dataMhs = [
            'nim'           => $this->request->getVar('nim'),
            'gender'        => $this->request->getVar('gender'),
            'no_hp'         => $this->request->getVar('no_hp'),
            'email'         => $this->request->getVar('email'),
            'foto'          => $this->request->getVar('foto'),
            'nama_tim'      => $this->request->getVar('nama_tim')
        ];

        $dataNamaMhs = [
            'nim'           => $this->request->getVar('nim'),
            'nama_depan'    => $this->request->getVar('nama_depan'),
            'nama_tengah'   => $this->request->getVar('nama_tengah'),
            'nama_belakang' => $this->request->getVar('nama_belakang')
        ];

        $this->mhs->insert($dataMhs);
        $this->namaMhs->insert($dataNamaMhs);

        if ($this->mhs->affectedRows() > 0) {
            if ($this->namaMhs->affectedRows() > 0) {
                return $this->respondCreated('Data berhasil tersimpan');
            } else {
                return $this->fail($this->namaMhs->errors());
            }
        } else {
            return $this->fail($this->mhs->errors());
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['nim'] = $id;

        $isExists = $this->mhs->where('nim', $id)->getAll();
        if (!$isExists) {
            return $this->failNotFound('Data tidak ditemukan untuk NIM ' . $id);
        }

        if ($this->mhs->update($id, $data)) {
            if ($this->namaMhs->update($id, $data)) {
                $response = [
                    'status'    => 200,
                    'error'     => null,
                    'messages'  => [
                        'success' => 'Data mahasiswa dengan NIM ' . $id . ' berhasil diupdate'
                    ]
                ];

                return $this->respond($response);
            } else {
                return $this->fail($this->namaMhs->errors());
            }
        } else {
            return $this->fail($this->mhs->errors());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->mhs->where('nim', $id)->findAll();
        if ($data) {
            $this->mhs->delete($id);

            return $this->respondDeleted('Data berhasil dihapus');
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
