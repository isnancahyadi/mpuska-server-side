<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'krs';
    protected $primaryKey       = 'ID_krs';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nim', 'kode_matkul', 'kelas', 'thn_ajaran'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nim'           => 'required',
        'kode_matkul'   => 'required',
        'kelas'         => 'required',
        'thn_ajaran'    => 'required'
    ];
    protected $validationMessages   = [
        'nim'           => ['required' => 'NIM tidak boleh kosong'],
        'kode_matkul'   => ['required' => 'Kode matakuliah tidak boleh kosong'],
        'kelas'         => ['required' => 'Kelas tidak boleh kosong'],
        'thn_ajaran'    => ['required' => 'Tahun ajaran tidak boleh kosong'],
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
        $builder = $this->db->table('krs');
        $builder->join('mahasiswa', 'mahasiswa.nim = krs.nim');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = krs.kode_matkul');

        $query = $builder->get();
        return $query->getResult();
    }

    function getSpecified($kode_matkul, $kelas)
    {
        $builder = $this->db->table('krs');
        $builder->join('mahasiswa', 'mahasiswa.nim = krs.nim');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = krs.kode_matkul');
        $builder->where('krs.kode_matkul', $kode_matkul);
        $builder->where('krs.kelas', $kelas);

        $query = $builder->get();
        return $query->getResult();
    }
}
