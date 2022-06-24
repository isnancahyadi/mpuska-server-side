<?php

namespace App\Controllers\Restapi;

use App\Models\MatakuliahKonvModel;
use CodeIgniter\RESTful\ResourceController;

class MatakuliahKonv extends ResourceController
{
    function __construct()
    {
        $this->matkulkonv = new MatakuliahKonvModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->matkulkonv->getAll();
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

        $this->matkulkonv->insert($data);

        if ($this->matkulkonv->affectedRows() > 0) {
            return $this->respondCreated('Data berhasil disimpan');
        } else {
            return $this->fail($this->matkulkonv->errors());
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

        $isExists = $this->matkulkonv->where('kode_matkul', $id)->getAll();
        if (!$isExists) {
            return $this->failNotFound('Data tidak ditemukan untuk kode matakuliah ' . $id);
        }

        if ($this->matkulkonv->update($id, $data)) {
            return $this->respondCreated('Data berhasil diupdate');
        } else {
            return $this->fail($this->matkulkonv->errors());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->matkulkonv->where('kode_matkul', $id)->findAll();
        if ($data) {
            $this->matkulkonv->delete($id);
            return $this->respondDeleted('Data berhasil dihapus');
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
