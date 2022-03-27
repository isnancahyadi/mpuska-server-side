<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'nim';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nim', 'gender', 'tempat_lahir', 'tgl_lahir', 'no_hp', 'email', 'foto', 'ID_akun'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nim'           => 'required',
        'gender'        => 'required',
        'tempat_lahir'  => 'required',
        'tgl_lahir'     => 'required',
        'email'         => 'required|valid_email'
    ];
    protected $validationMessages   = [
        'nim'           => ['required' => 'NIM harus diisi'],
        'gender'        => ['required' => 'Jenis kelamin harus diisi'],
        'tempat_lahir'  => ['required' => 'Tempat lahir harus diisi'],
        'tgl_lahir'     => ['required' => 'Tanggal lahir harus diisi'],
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
        $builder = $this->db->table('mahasiswa');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('ca_alamat_mahasiswa', 'ca_alamat_mahasiswa.nim = mahasiswa.nim');

        $query = $builder->get();
        return $query->getResult();
    }

    function getSpecified($id)
    {
        $builder = $this->db->table('mahasiswa');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('ca_alamat_mahasiswa', 'ca_alamat_mahasiswa.nim = mahasiswa.nim');
        $builder->where('mahasiswa.nim', $id);

        $query = $builder->get();

        return $query->getResult();
    }
}
