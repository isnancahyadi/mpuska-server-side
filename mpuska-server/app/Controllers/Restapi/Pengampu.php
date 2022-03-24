<?php

namespace App\Controllers\Restapi;

use App\Models\PengampuModel;
use CodeIgniter\RESTful\ResourceController;

class Pengampu extends ResourceController
{
    function __construct()
    {
        $this->pengampu = new PengampuModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->pengampu->getDataPengampu();
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

        $this->pengampu->insert($data);

        if ($this->pengampu->affectedRows() > 0) {
            return $this->respondCreated('Data berhasil disimpan');
        } else {
            return $this->fail($this->pengampu->errors());
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
        $data['ID_pengampu'] = $id;

        $isExists = $this->pengampu->where('ID_pengampu', $id)->getAll();
        if (!$isExists) {
            return $this->failNotFound('Data tidak ditemukan untuk kode ID pengampu ' . $id);
        }

        if ($this->pengampu->update($id, $data)) {
            return $this->respondCreated('Data berhasil diupdate');
        } else {
            return $this->fail($this->pengampu->errors());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->pengampu->where('ID_pengampu', $id)->findAll();
        if ($data) {
            $this->pengampu->delete($id);
            return $this->respondDeleted('Data berhasil dihapus');
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
