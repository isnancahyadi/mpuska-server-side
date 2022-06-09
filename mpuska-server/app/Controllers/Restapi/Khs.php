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

    public function getAssessment($id = null)
    {
        $post = $this->request->getPost();

        $data = $this->khs->getAssessment($id, $post['kode_matkul'], $post['kelas'], $post['thn_ajaran']);
        return $this->respond($data);
    }

    public function getcpl($id = null)
    {
        $data = $this->khs->getcpl($id);
        return $this->respond($data);
    }

    public function getcpmk($id = null)
    {
        $data = $this->khs->getcpmk($id);
        return $this->respond($data);
    }


    public function updateScoreMhs($id = null)
    {
        $data = $this->request->getRawInput();

        foreach ($data['ID_asesmen'] as $key => $value) {
            $batchData[] = [
                'ID_asesmen' => (int)$data['ID_asesmen'][$key],
                'nilai' => (int)$data['nilai'][$key]
            ];
        }

        $builder = $this->db->table('khs');
        $builder->where('ID_krs', $id);
        $builder->updateBatch($batchData, 'ID_asesmen');
    }

    public function updateAssessments()
    {
        $data = $this->request->getRawInput();

        foreach ($data['ID_asesmen'] as $key => $value) {
            $batchData[] = [
                'ID_asesmen' => (int)$data['ID_asesmen'][$key],
                'nama' => $data['nama'][$key],
                'bobot' => (int)$data['bobot'][$key]
            ];
        }

        $builder = $this->db->table('asesmen');
        $builder->updateBatch($batchData, 'ID_asesmen');
    }
}
