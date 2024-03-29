<?php

namespace App\Models;

use CodeIgniter\Model;

class CapaianMkModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'cpmk';
    protected $primaryKey       = 'ID_cpmk';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode_matkul', 'cpmk'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'kode_matkul' => 'required',
        'cpmk' => 'required'
    ];
    protected $validationMessages   = [
        'kode_matkul' => ['required' => 'Kode matakuliah tidak boleh kosong'],
        'cpmk' => ['required' => 'CPMK tidak boleh kosong']
    ];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    function getCourse()
    {
        $builder = $this->db->table('matakuliah');
        $builder->select('matakuliah.kode_matkul, matakuliah.nama');
        $builder->join('capaian_lulusan', 'matakuliah.kode_matkul = capaian_lulusan.kode_matkul');
        $builder->join('cpl', 'capaian_lulusan.ID_cpl = cpl.ID_cpl');
        $builder->join('cpmk', 'matakuliah.kode_matkul = cpmk.kode_matkul');
        $builder->groupBy('matakuliah.kode_matkul');

        $query = $builder->get();
        return $query->getResult();
    }

    function getSpecifiedCourse($id)
    {
        $builder = $this->db->table('matakuliah');
        $builder->select('matakuliah.kode_matkul, matakuliah.nama');
        $builder->join('capaian_lulusan', 'matakuliah.kode_matkul = capaian_lulusan.kode_matkul');
        $builder->join('cpl', 'capaian_lulusan.ID_cpl = cpl.ID_cpl');
        $builder->join('cpmk', 'matakuliah.kode_matkul = cpmk.kode_matkul');
        $builder->where('matakuliah.kode_matkul', $id);
        $builder->groupBy('matakuliah.kode_matkul');

        $query = $builder->get();
        return $query->getResult();
    }

    function getCpl($id)
    {
        $builder = $this->db->table('matakuliah');
        $builder->select('capaian_lulusan.KEY_cpl, cpl.ID_cpl, cpl.cpl');
        $builder->join('capaian_lulusan', 'matakuliah.kode_matkul = capaian_lulusan.kode_matkul');
        $builder->join('cpl', 'capaian_lulusan.ID_cpl = cpl.ID_cpl');
        $builder->where('matakuliah.kode_matkul', $id);

        $query = $builder->get();
        return $query->getResult();
    }

    function getCpmk($id)
    {
        $builder = $this->db->table('matakuliah');
        $builder->select('cpmk.ID_cpmk, cpmk.cpmk');
        $builder->join('cpmk', 'matakuliah.kode_matkul = cpmk.kode_matkul');
        $builder->where('matakuliah.kode_matkul', $id);

        $query = $builder->get();
        return $query->getResult();
    }

    function getAchievementsCpmk($id, $idCpmk)
    {
        $builder = $this->db->table('ketercapaian_cpmk');
        $builder->select('pengampu.ID_pengampu, pengampu.kode_matkul, ketercapaian_cpmk.ID_cpmk, asesmen.nama');
        $builder->join('pengampu', 'ketercapaian_cpmk.ID_pengampu = pengampu.ID_pengampu');
        $builder->join('asesmen', 'ketercapaian_cpmk.ID_asesmen = asesmen.ID_asesmen');
        $builder->where('ketercapaian_cpmk.ID_pengampu', $id);
        $builder->where('ketercapaian_cpmk.ID_cpmk', $idCpmk);

        $query = $builder->get();
        return $query->getResult();
    }

    function getScoreByCpmk($id, $idCpmk)
    {
        $builder = $this->db->table('ketercapaian_cpmk');
        $builder->select('asesmen.nama, nilai.bobot, nilai.nilai');
        $builder->join('asesmen', 'ketercapaian_cpmk.ID_asesmen = asesmen.ID_asesmen');
        $builder->join('nilai', 'asesmen.ID_asesmen = nilai.ID_asesmen');
        $builder->where('ketercapaian_cpmk.ID_cpmk', $idCpmk);
        $builder->where('nilai.ID_krs', $id);

        $query = $builder->get();
        return $query->getResult();
    }
}
