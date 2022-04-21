<?php

namespace App\Models;

use CodeIgniter\Model;

class AlamatDosModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'ca_alamat_dosen';
    protected $primaryKey       = 'niy_nip';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['niy_nip', 'alamat', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'niy_nip'   => 'required',
        'alamat'    => 'required',
        'kecamatan' => 'required',
        'kabupaten' => 'required',
        'provinsi'  => 'required',
        'kode_pos'  => 'required'
    ];
    protected $validationMessages   = [
        'niy_nip'   => ['required' => 'NIY/NIP harus diisi'],
        'alamat'    => ['required' => 'Alamat harus diisi'],
        'kecamatan' => ['required' => 'Kecamatan harus diisi'],
        'kabupaten' => ['required' => 'Kabupaten harus diisi'],
        'provinsi'  => ['required' => 'Provinsi harus diisi'],
        'kode_pos'  => ['required' => 'Kode pos harus diisi']
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
