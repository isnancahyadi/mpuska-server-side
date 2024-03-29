<?php

namespace App\Controllers\Restapi;

use App\Models\CapaianModel;
use CodeIgniter\RESTful\ResourceController;

class Capaian extends ResourceController
{
    function __construct()
    {
        $this->cpl = new CapaianModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->cpl->getAll();
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

        $this->cpl->insert($data);

        if ($this->cpl->affectedRows() > 0) {
            return $this->respondCreated('Data berhasil disimpan');
        } else {
            return $this->fail($this->cpl->errors());
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
        $data['ID_cpl'] = $id;

        $isExists = $this->cpl->where('ID_cpl', $id)->getAll();
        if (!$isExists) {
            return $this->failNotFound('Data tidak ditemukan untuk ID CPL ' . $id);
        }

        if ($this->cpl->update($id, $data)) {
            return $this->respondUpdated('Data berhasil diupdate');
        } else {
            return $this->fail($this->cpl->errors());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->cpl->where('ID_cpl', $id)->findAll();
        if ($data) {
            $this->cpl->delete($id);
            return $this->respondDeleted('Data berhasil dihapus');
        } else {
            return $this->failNotFound('Data tidak ditemukan');
        }
    }
}
