<?php

namespace App\Controllers\Restapi;

use App\Models\MahasiswaModel;
use App\Models\NamaMhsModel;
use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
    function __construct()
    {
        $this->mhs      = new MahasiswaModel();
        $this->namaMhs  = new NamaMhsModel();
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
        $dataMhs = [
            'nim'           => $this->request->getVar('nim'),
            'gender'        => $this->request->getVar('gender'),
            'tempat_lahir'  => $this->request->getVar('tempat_lahir'),
            'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'no_hp'         => $this->request->getVar('no_hp'),
            'email'         => $this->request->getVar('email'),
            'foto'          => $this->request->getVar('foto')
        ];

        $dataNamaMhs = [
            'nim'           => $this->request->getVar('nim'),
            'nama_depan'    => $this->request->getVar('nama_depan'),
            'nama_tengah'   => $this->request->getVar('nama_tengah'),
            'nama_belakang' => $this->request->getVar('nama_belakang'),
        ];

        $this->mhs->insert($dataMhs);
        $this->namaMhs->insert($dataNamaMhs);

        if ($this->mhs->affectedRows() > 0) {
            if ($this->namaMhs->affectedRows() > 0) {
                return $this->respondCreated('Data berhasil tersimpan');
            } else {
                return $this->fail($this->mhs->errors());
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
