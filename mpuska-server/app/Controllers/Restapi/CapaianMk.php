<?php

namespace App\Controllers\Restapi;

use App\Models\CapaianMkModel;
use App\Models\CapaianModel;
use CodeIgniter\RESTful\ResourceController;

class CapaianMk extends ResourceController
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->cpmk = new CapaianMkModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $getCourse = $this->cpmk->getCourse();

        foreach ($getCourse as $key => $value) {
            $value->capaian_lulusan = $this->cpmk->getCpl($value->kode_matkul);
            $value->capaian_matakuliah = $this->cpmk->getCpmk($value->kode_matkul);
        }

        return $this->respond($getCourse);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $getCourse = $this->cpmk->getSpecifiedCourse($id);

        foreach ($getCourse as $key => $value) {
            $value->capaian_lulusan = $this->cpmk->getCpl($value->kode_matkul);
            $value->capaian_matakuliah = $this->cpmk->getCpmk($value->kode_matkul);
        }

        return $this->respond($getCourse);
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

        //$this->cpmk->insert($data['cpmk']);
        // $data['cpmk'] = json_encode($data['cpmk']);
        // $data['cpmk'] = htmlspecialchars_decode($data['cpmk']);
        $cpl = explode(",", $data['cpmk']);
        //$cpl = json_encode($cpl);
        // var_dump($cpl);

        foreach ($data['ID_cpl'] as $keyCpl => $valueCpl) {
            $batchDataCpl[] = [
                'kode_matkul' => $data['kode_matkul'],
                'ID_cpl' => (int)$data['ID_cpl'][$keyCpl]
            ];
        }

        foreach ($cpl as $keyCpmk => $valueCpmk) {
            $batchDataCpmk[] = [
                'kode_matkul' => $data['kode_matkul'],
                'cpmk' => $cpl[$keyCpmk]
            ];
        }
        //var_dump($batchDataCpmk);

        // //var_dump($batchDataCpl);

        $queryCpl = $this->db->table('capaian_lulusan');
        $queryCpl->insertBatch($batchDataCpl);
        $queryCpmk = $this->db->table('cpmk');
        $queryCpmk->insertBatch($batchDataCpmk);

        return $this->respondCreated('Data berhasil ditambahkan');
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

        $cpmk = explode(",", $data['cpmk']);

        // $this->cpmk->getSpecifiedCourse($id);
        if ($this->cpmk->getSpecifiedCourse($id)) {
            foreach ($data['cpl'] as $keyCpl => $valueCpl) {
                $vpcl[] = explode(",", $valueCpl);
                // $batchDataCpl[] = [
                //     'KEY_cpl' => $data['KEY_cpl'][$keyCpl],
                //     'kode_matkul' => $data['kode_matkul'],
                //     'ID_cpl' => (int)$data['ID_cpl'][$keyCpl]
                // ];
            }
            foreach ($vpcl as $k => $v) {
                $batchDataCpl[] = [
                    'kode_matkul' => $data['kode_matkul'],
                    'KEY_cpl' => $v[1],
                    'ID_cpl' => $v[0]
                ];
            }

            foreach ($cpmk as $keyCpmk => $valueCpmk) {
                $batchDataCpmk[] = [
                    'kode_matkul' => $data['kode_matkul'],
                    'cpmk' => $cpmk[$keyCpmk]
                ];
            }

            //return $this->respond($batchDataCpmk);

            //var_dump($data);

            $queryCpl = $this->db->table('capaian_lulusan');
            $queryCpl->updateBatch($batchDataCpl, 'KEY_cpl');
            $queryCpmk = $this->db->table('cpmk');
            $queryCpmk->updateBatch($batchDataCpmk, 'kode_matkul');

            return $this->respondUpdated('Data berhasil diupdate');
        } else {
            return $this->failNotFound('Data tidak ditemukan untuk kode matakuliah ' . $id);
        }
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
