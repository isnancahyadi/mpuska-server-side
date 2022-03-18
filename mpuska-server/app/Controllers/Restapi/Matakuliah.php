<?php

namespace App\Controllers\Restapi;

use App\Models\MatakuliahModel;
use CodeIgniter\RESTful\ResourceController;

class Matakuliah extends ResourceController
{
    function __construct()
    {
        $this->matkul = new MatakuliahModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->matkul->getAll();
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
    public function create()
    {
        $data = $this->request->getPost();

        $this->matkul->insert($data);

        if ($this->matkul->affectedRows() > 0) {
            return $this->respondCreated('Data berhasil disimpan');
        } else {
            return $this->fail($this->matkul->errors());
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
        $data['kode_matkul'] = $id;

        $isExists = $this->matkul->where('kode_matkul', $id)->getAll();
        if (!$isExists) {
            return $this->failNotFound('Data tidak ditemukan untuk kode matakuliah ' . $id);
        }

        if ($this->matkul->update($id, $data)) {
            return $this->respondCreated('Data berhasil diupdate');
        } else {
            return $this->fail($this->matkul->errors());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->matkul->where('kode_matkul', $id)->findAll();
        if ($data) {
            $this->matkul->delete($id);
            return $this->respondDeleted('Data berhasil dihapus');
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
