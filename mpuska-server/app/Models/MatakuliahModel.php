<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'matakuliah';
    protected $primaryKey       = 'kode_matkul';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['kode_matkul', 'nama', 'semester', 'sks', 'prodi'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'kode_matkul'   => 'required',
        'nama'          => 'required',
        'semester'      => 'required',
        'sks'           => 'required',
        'prodi'         => 'required'
    ];
    protected $validationMessages   = [
        'kode_matkul'   => ['required' => 'Kode matakuliah tidak boleh kosong'],
        'nama'          => ['required' => 'Nama matakuliah harus diisi'],
        'semester'      => ['required' => 'Semester harus diisi'],
        'sks'           => ['required' => 'SKS harus diisi'],
        'prodi'         => ['required' => 'Program studi tidak boleh kosong']
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

    function getAll()
    {
        $builder = $this->db->table('matakuliah');
        $query = $builder->get();

        return $query->getResult();
    }

    function getSpecified($id)
    {
        $builder = $this->db->table('matakuliah');
        $builder->where('kode_matkul', $id);

        $query = $builder->get();

        return $query->getResult();
    }
}
