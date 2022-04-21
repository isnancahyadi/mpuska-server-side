<?php

namespace App\Models;

use CodeIgniter\Model;

class PengampuModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'pengampu';
    protected $primaryKey       = 'ID_pengampu';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['niy_nip', 'kode_matkul', 'kelas', 'thn_ajaran'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'niy_nip'       => 'required',
        'kode_matkul'   => 'required',
        'kelas'         => 'required',
        'thn_ajaran'    => 'required'
    ];
    protected $validationMessages   = [
        'niy_nip'       => ['required' => 'NIY/NIP tidak boleh kosong'],
        'kode_matkul'   => ['required' => 'Kode matakuliah tidak boleh kosong'],
        'kelas'         => ['required' => 'Kelas harus diisi'],
        'thn_ajaran'    => ['required' => 'Tahun ajaran harus diisi']
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
        $builder = $this->db->table('pengampu');
        $builder->join('dosen', 'dosen.niy_nip = pengampu.niy_nip');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = pengampu.kode_matkul');

        $query = $builder->get();
        return $query->getResult();
    }

    function getDataPengampu()
    {
        $builder = $this->db->table('pengampu');
        $builder->select('pengampu.ID_pengampu, matakuliah.nama, matakuliah.semester, matakuliah.sks, matakuliah.prodi, ca_nama_dosen.nama_depan, ca_nama_dosen.nama_tengah, ca_nama_dosen.nama_belakang, pengampu.kelas, pengampu.thn_ajaran');
        $builder->join('dosen', 'dosen.niy_nip = pengampu.niy_nip');
        $builder->join('ca_nama_dosen', 'dosen.niy_nip = ca_nama_dosen.niy_nip');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = pengampu.kode_matkul');

        $query = $builder->get();
        return $query->getResult();
    }

    function getSpecified($id)
    {
        $builder = $this->db->table('pengampu');
        $builder->join('dosen', 'dosen.niy = pengampu.niy');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = pengampu.kode_matkul');
        $builder->where('dosen.niy', $id);

        $query = $builder->get();

        return $query->getResult();
    }

    function getSpecifiedDataPengampu($id)
    {
        $builder = $this->db->table('pengampu');
        $builder->select('pengampu.ID_pengampu, matakuliah.nama, matakuliah.kode_matkul, matakuliah.semester, matakuliah.sks, matakuliah.prodi, ca_nama_dosen.nama_depan, ca_nama_dosen.nama_tengah, ca_nama_dosen.nama_belakang, pengampu.kelas, pengampu.thn_ajaran');
        $builder->join('dosen', 'dosen.niy = pengampu.niy');
        $builder->join('ca_nama_dosen', 'dosen.niy = ca_nama_dosen.niy');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = pengampu.kode_matkul');
        $builder->where('dosen.niy', $id);

        $query = $builder->get();

        return $query->getResult();
    }
}
