<?php

namespace App\Controllers\Restapi;

use App\Models\DosenModel;
use App\Models\NamaDosModel;
use CodeIgniter\RESTful\ResourceController;

class Dosen extends ResourceController
{
    function __construct()
    {
        $this->dos          = new DosenModel();
        $this->namaDos      = new NamaDosModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->dos->getAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->dos->getSpecified($id);
        return $this->respond($data);
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

    // Input data Dosen
    public function create()
    {
        $dataDos = [
            'niy_nip'       => $this->request->getVar('niy_nip'),
            'gender'        => $this->request->getVar('gender'),
            'no_hp'         => $this->request->getVar('no_hp'),
            'email'         => $this->request->getVar('email'),
            'foto'          => $this->request->getVar('foto')
        ];

        $dataNamaDos = [
            'niy_nip'           => $this->request->getVar('niy_nip'),
            'gelar_depan'       => $this->request->getVar('gelar_depan'),
            'nama_depan'        => $this->request->getVar('nama_depan'),
            'nama_tengah'       => $this->request->getVar('nama_tengah'),
            'nama_belakang'     => $this->request->getVar('nama_belakang'),
            'gelar_belakang'    => $this->request->getVar('gelar_belakang')
        ];

        $this->dos->insert($dataDos);
        $this->namaDos->insert($dataNamaDos);

        if ($this->dos->affectedRows() > 0) {
            if ($this->namaDos->affectedRows() > 0) {
                return $this->respondCreated('Data berhasil tersimpan');
            } else {
                return $this->fail($this->namaDos->errors());
            }
        } else {
            return $this->fail($this->dos->errors());
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
        $data['niy_nip'] = $id;

        $isExists = $this->dos->where('niy_nip', $id)->getAll();
        if (!$isExists) {
            return $this->failNotFound('Data tidak ditemukan untuk NIY/NIP ' . $id);
        }

        if ($this->dos->update($id, $data)) {
            if ($this->namaDos->update($id, $data)) {
                return $this->respondCreated('Data berhasil diupdate');
            } else {
                return $this->fail($this->namaDos->errors());
            }
        } else {
            return $this->fail($this->dos->errors());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->dos->where('niy_nip', $id)->findAll();
        if ($data) {
            $this->dos->delete($id);

            return $this->respondDeleted('Data berhasil dihapus');
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
