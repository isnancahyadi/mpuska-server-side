<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'dosen';
    protected $primaryKey       = 'niy_nip';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['niy_nip', 'gender', 'no_hp', 'email', 'foto', 'ID_akun', 'status_mbkm'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'niy_nip'       => 'required',
        'gender'        => 'required',
        'email'         => 'required|valid_email'
    ];
    protected $validationMessages   = [
        'niy_nip'       => ['required' => 'NIY/NIP harus diisi'],
        'gender'        => ['required' => 'Jenis kelamin harus diisi'],
        'email'         => [
            'required'      => 'Email harus diisi',
            'valid_email'   => 'Email tidak valid'
        ]
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
        $builder = $this->db->table('dosen');
        $builder->join('ca_nama_dosen', 'ca_nama_dosen.niy_nip = dosen.niy_nip');

        $query = $builder->get();
        return $query->getResult();
    }

    function getSpecified($id)
    {
        $builder = $this->db->table('dosen');
        $builder->join('ca_nama_dosen', 'ca_nama_dosen.niy_nip = dosen.niy_nip');
        $builder->where('dosen.niy_nip', $id);

        $query = $builder->get();

        return $query->getResult();
    }
}
