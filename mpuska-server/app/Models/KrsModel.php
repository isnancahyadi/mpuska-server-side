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
    protected $allowedFields    = ['nim', 'ID_pengampu'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nim'           => 'required',
        'ID_pengampu'   => 'required'
    ];
    protected $validationMessages   = [
        'nim'           => ['required' => 'NIM tidak boleh kosong'],
        'ID_pengampu'   => ['required' => 'Pengampu matakuliah tidak boleh kosong']
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
        $builder->select('krs.ID_krs, mahasiswa.nim, ca_nama_mahasiswa.nama_depan as nama_depan_mahasiswa, ca_nama_mahasiswa.nama_tengah as nama_tengah_mahasiswa, ca_nama_mahasiswa.nama_belakang as nama_belakang_mahasiswa, mahasiswa.gender, mahasiswa.no_hp, mahasiswa.email, mahasiswa.nama_tim, 
                            matakuliah.kode_matkul, matakuliah.nama, matakuliah.semester, matakuliah.sks, matakuliah.prodi,
                            dosen.niy_nip, ca_nama_dosen.gelar_depan, ca_nama_dosen.nama_depan as nama_depan_dosen, ca_nama_dosen.nama_tengah as nama_tengah_dosen, ca_nama_dosen.nama_belakang as nama_belakang_dosen, ca_nama_dosen.gelar_belakang,
                            pengampu.kelas, pengampu.thn_ajaran');
        $builder->join('mahasiswa', 'mahasiswa.nim = krs.nim');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('pengampu', 'pengampu.ID_pengampu = krs.ID_pengampu');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = pengampu.kode_matkul');
        $builder->join('dosen', 'dosen.niy_nip = pengampu.niy_nip');
        $builder->join('ca_nama_dosen', 'ca_nama_dosen.niy_nip = dosen.niy_nip');

        $query = $builder->get();
        return $query->getResult();
    }

    function getSpecified($id)
    {
        $builder = $this->db->table('krs');
        $builder->select('krs.ID_krs, mahasiswa.nim, ca_nama_mahasiswa.nama_depan as nama_depan_mahasiswa, ca_nama_mahasiswa.nama_tengah as nama_tengah_mahasiswa, ca_nama_mahasiswa.nama_belakang as nama_belakang_mahasiswa, mahasiswa.gender, mahasiswa.no_hp, mahasiswa.email, mahasiswa.nama_tim, 
                            matakuliah.kode_matkul, matakuliah.nama, matakuliah.semester, matakuliah.sks, matakuliah.prodi,
                            dosen.niy_nip, ca_nama_dosen.gelar_depan, ca_nama_dosen.nama_depan as nama_depan_dosen, ca_nama_dosen.nama_tengah as nama_tengah_dosen, ca_nama_dosen.nama_belakang as nama_belakang_dosen, ca_nama_dosen.gelar_belakang,
                            pengampu.kelas, pengampu.thn_ajaran');
        $builder->join('mahasiswa', 'mahasiswa.nim = krs.nim');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('pengampu', 'pengampu.ID_pengampu = krs.ID_pengampu');
        $builder->join('matakuliah', 'matakuliah.kode_matkul = pengampu.kode_matkul');
        $builder->join('dosen', 'dosen.niy_nip = pengampu.niy_nip');
        $builder->join('ca_nama_dosen', 'ca_nama_dosen.niy_nip = dosen.niy_nip');
        $builder->where('krs.ID_pengampu', $id);

        $query = $builder->get();
        return $query->getResult();
    }
}
