<?php

namespace App\Controllers\Restapi;

use App\Controllers\BaseController;
use App\Models\KhsModel;
use CodeIgniter\API\ResponseTrait;

class Khs extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->khs = new KhsModel();
    }

    public function index()
    {
        $data = $this->khs->getAll();
        return $this->respond($data);
    }

    public function getListMhs($id = null)
    {
        $post = $this->request->getPost();

        $data = $this->khs->getMhs($id, $post['kode_matkul'], $post['kelas'], $post['thn_ajaran']);
        return $this->respond($data);
    }

    public function getScoreMhs($id = null)
    {
        $post = $this->request->getPost();

        $data = $this->khs->getScoreMhs($id, $post['kode_matkul'], $post['kelas'], $post['thn_ajaran']);
        return $this->respond($data);
    }
}
