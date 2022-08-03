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

    public function getListKhsMhs($id = null)
    {
        $post = $this->request->getPost();

        $data = $this->khs->getSpecifiedPengampu($id, $post['nim']);
        return $this->respond($data);
    }

    public function getScoreMhs($id = null)
    {
        $data = $this->khs->getScoreMhs($id);
        return $this->respond($data);
    }

    public function getAssessment($id = null)
    {
        //$post = $this->request->getPost();

        $data = $this->khs->getAssessment($id);
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

        $builder = $this->db->table('nilai');
        $builder->where('ID_krs', $id);
        $builder->updateBatch($batchData, 'ID_asesmen');
    }

    public function updateAssessments($id = null)
    {
        $data = $this->request->getRawInput();

        // foreach ($data['ID_asesmen'] as $key => $value) {
        //     $batchData[] = [
        //         'ID_asesmen' => (int)$data['ID_asesmen'][$key],
        //         'nama' => $data['nama'][$key],
        //         'bobot' => (int)$data['bobot'][$key]
        //     ];
        // }

        // $builder = $this->db->table('asesmen');
        // $builder->updateBatch($batchData, 'ID_asesmen');

        $queryGetIdKrs = $this->db->table('krs')->select('ID_krs')->getWhere(['ID_pengampu' => $id]);

        foreach ($queryGetIdKrs->getResultArray() as $key) {
            foreach ($data['ID_asesmen'] as $k => $value) {
                $batchData[] = [
                    'KEY_nilai' => (int)$data['KEY_nilai'][$k],
                    'ID_asesmen' => (int)$data['ID_asesmen'][$k],
                    'bobot' => (int)$data['bobot'][$k]
                ];
            }
        }

        $builder = $this->db->table('nilai');
        $builder->updateBatch($batchData, 'KEY_nilai');

        return $this->respondUpdated('Data berhasil diupdate');
    }

    public function addAssessment($id = null)
    {
        $post = $this->request->getPost();

        $maxKeyScore = $this->db->table('nilai')->selectMax('KEY_nilai')->get();
        $queryKeyScore = $maxKeyScore->getRow();

        $findKeyScore = $this->db->table('nilai')->select('KEY_nilai')->get()->getResult();

        $kScore = 0;

        if ($findKeyScore == null) {
            $kScore = 1;
        } else {
            $kScore = $queryKeyScore->KEY_nilai + 1;
        }

        $queryGetIdKrs = $this->db->table('krs')->select('ID_krs')->getWhere(['ID_pengampu' => $id]);

        foreach ($queryGetIdKrs->getResultArray() as $key) {
            $batchData[] = [
                'KEY_nilai' => $kScore,
                'ID_krs' => $key['ID_krs'],
                'ID_asesmen' => (int)$post['ID_asesmen'],
                'bobot' => (int)$post['bobot']
            ];
        }

        $builder = $this->db->table('nilai');
        $builder->insertBatch($batchData);

        return $this->respondCreated('Data berhasil ditambahkan');
    }

    public function searchCourse($id)
    {
        //$post = $this->request->getPost();

        $query = $this->db->table('konversi')->getWhere(['kode_matkul' => $id]);
        $course = $query->getResult();

        if ($id == null) {
            return $this->fail('Tidak ada kode matkul');
        } else {
            if ($course) {
                // $params = [
                //     'kode_matkul' => $course->kode_matkul,
                //     'kode_matkul_konv' => $course->kode_matkul_konv
                // ];

                return $this->respond($course, 200);
            } else {
                return $this->failNotFound('Kode matakuliah tidak ditemukan');
            }
        }
    }

    public function searchMhsInCourseConv($id)
    {
        $query = $this->db->table('khs_konv')->getWhere(['ID_krs' => (int)$id]);
        $mhs = $query->getResult();

        if ($id == null) {
            return $this->fail('Tidak ada ID KRS');
        } else {
            if ($mhs) {
                return $this->respond('ID KRS ditemukan', 200);
            } else {
                return $this->failNotFound('ID KRS tidak ditemukan');
            }
        }
    }
}
