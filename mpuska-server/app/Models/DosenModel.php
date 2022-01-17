<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'dosen';
    protected $primaryKey       = 'niy';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['niy', 'gender', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'email', 'foto', 'ID_akun'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'niy'           => 'required',
        'gender'        => 'required',
        'tempat_lahir'  => 'required',
        'tgl_lahir'     => 'required',
        'email'         => 'valid_email'
    ];
    protected $validationMessages   = [
        'niy'           => ['required' => 'NIY harus diisi'],
        'gender'        => ['required' => 'Jenis kelamin harus diisi'],
        'tempat_lahir'  => ['required' => 'Tempat lahir harus diisi'],
        'tgl_lahir'     => ['required' => 'Tanggal lahir harus diisi'],
        'email'         => ['valid_email' => 'Email tidak valid']
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
}
