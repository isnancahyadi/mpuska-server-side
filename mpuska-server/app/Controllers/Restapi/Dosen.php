<?php

namespace App\Controllers\Restapi;

use App\Models\DosenModel;
use CodeIgniter\RESTful\ResourceController;

class Dosen extends ResourceController
{
    function __construct()
    {
        $this->dos = new DosenModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
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

    // Input data Dosen
    public function create()
    {
        $data = $this->request->getPost();

        $this->dos->insert($data);

        if ($this->dos->affectedRows() > 0) {
            return $this->respondCreated('Data berhasil tersimpan');
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
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
