<?php

namespace App\Models;

use CodeIgniter\Model;

class NamaDosModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'ca_nama_dosen';
    protected $primaryKey       = 'niy_nip';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['niy_nip', 'nama_depan', 'nama_tengah', 'nama_belakang'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['niy_nip' => 'required'];
    protected $validationMessages   = ['niy_nip' => ['required' => 'NIY/NIP harus diisi']];
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
}
