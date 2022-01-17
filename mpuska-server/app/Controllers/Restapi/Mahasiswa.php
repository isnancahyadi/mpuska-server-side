<?php

namespace App\Controllers\Restapi;

use App\Models\MahasiswaModel;
use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
    function __construct()
    {
        $this->mhs = new MahasiswaModel();
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

    // Input data Mahasiswa
    public function create()
    {
        $data = $this->request->getPost();

        $this->mhs->insert($data);

        if ($this->mhs->affectedRows() > 0) {
            return $this->respondCreated('Data berhasil tersimpan');
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
