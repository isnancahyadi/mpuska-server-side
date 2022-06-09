<?php

namespace App\Models;

use App\Controllers\Restapi\Khs;
use CodeIgniter\Model;

class KhsModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'khs';
    protected $primaryKey       = 'ID_khs';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['ID_krs', 'ID_asesmen', 'ID_pengampu', 'nilai'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
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
        $builder = $this->db->table('khs');
        $builder->join('krs', 'khs.ID_krs = krs.ID_krs');
        $builder->join('mahasiswa', 'krs.nim = mahasiswa.nim');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('matakuliah', 'krs.kode_matkul = matakuliah.kode_matkul');
        $builder->join('asesmen', 'khs.ID_asesmen = asesmen.ID_asesmen');
        $builder->join('pengampu', 'khs.ID_pengampu = pengampu.ID_pengampu');
        $builder->join('dosen', 'pengampu.niy_nip = dosen.niy_nip');
        $builder->join('ca_nama_dosen', 'dosen.niy_nip = ca_nama_dosen.niy_nip');

        $query = $builder->get();
        return $query->getResult();
    }

    function getSpecifiedMhs($id)
    {
        $builder = $this->db->table('khs');
        $builder->select('khs.ID_khs AS id_khs, mahasiswa.nim AS nim, ca_nama_mahasiswa.nama_depan AS nm_dpn_mhs, ca_nama_mahasiswa.nama_tengah AS nm_tgh_mhs, ca_nama_mahasiswa.nama_belakang AS nm_blk_mhs, matakuliah.kode_matkul AS kode_matkul, matakuliah.nama AS matkul_diambil, ca_nama_dosen.gelar_depan AS gl_dpn_dos, ca_nama_dosen.nama_depan AS nm_dpn_dos, ca_nama_dosen.nama_tengah AS nm_tgh_dos, ca_nama_dosen.nama_belakang AS nm_blk_dos, ca_nama_dosen.gelar_belakang AS gl_blk_dos, matakuliah.semester AS semester, matakuliah.sks AS sks, matakuliah.prodi AS prodi, krs.kelas AS kelas, krs.thn_ajaran AS thn_ajaran, asesmen.nama AS jenis_asesmen, khs.nilai AS nilai');
        $builder->join('krs', 'khs.ID_krs = krs.ID_krs');
        $builder->join('mahasiswa', 'krs.nim = mahasiswa.nim');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('matakuliah', 'krs.kode_matkul = matakuliah.kode_matkul');
        $builder->join('asesmen', 'khs.ID_asesmen = asesmen.ID_asesmen');
        $builder->join('pengampu', 'khs.ID_pengampu = pengampu.ID_pengampu');
        $builder->join('dosen', 'pengampu.niy_nip = dosen.niy_nip');
        $builder->join('ca_nama_dosen', 'dosen.niy_nip = ca_nama_dosen.niy_nip');
        $builder->where('dosen.niy_nip', $id);

        $query = $builder->get();
        return $query->getResult();
    }

    function getMhs($id, $kode_matkul, $kelas, $thn_ajaran)
    {
        $builder = $this->db->table('khs');
        $builder->select('krs.ID_krs, mahasiswa.nim, ca_nama_mahasiswa.nama_depan, ca_nama_mahasiswa.nama_tengah, ca_nama_mahasiswa.nama_belakang, mahasiswa.nama_tim, mahasiswa.foto');
        $builder->join('krs', 'khs.ID_krs = krs.ID_krs');
        $builder->join('mahasiswa', 'krs.nim = mahasiswa.nim');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('matakuliah', 'krs.kode_matkul = matakuliah.kode_matkul');
        $builder->join('pengampu', 'khs.ID_pengampu = pengampu.ID_pengampu');
        $builder->join('dosen', 'pengampu.niy_nip = dosen.niy_nip');
        $builder->groupBy('mahasiswa.nim');
        $builder->where('dosen.niy_nip', $id);
        $builder->where('pengampu.kode_matkul', $kode_matkul);
        $builder->where('pengampu.kelas', $kelas);
        $builder->where('pengampu.thn_ajaran', $thn_ajaran);

        $query = $builder->get();
        return $query->getResult();
    }

    function getScoreMhs($id, $kode_matkul, $kelas, $thn_ajaran)
    {
        $builder = $this->db->table('khs');
        $builder->select('khs.ID_asesmen, asesmen.nama, asesmen.bobot, khs.nilai');
        $builder->join('krs', 'khs.ID_krs = krs.ID_krs');
        $builder->join('mahasiswa', 'krs.nim = mahasiswa.nim');
        $builder->join('ca_nama_mahasiswa', 'ca_nama_mahasiswa.nim = mahasiswa.nim');
        $builder->join('matakuliah', 'krs.kode_matkul = matakuliah.kode_matkul');
        $builder->join('asesmen', 'khs.ID_asesmen = asesmen.ID_asesmen');
        $builder->join('pengampu', 'khs.ID_pengampu = pengampu.ID_pengampu');
        $builder->join('dosen', 'pengampu.niy_nip = dosen.niy_nip');
        $builder->where('mahasiswa.nim', $id);
        $builder->where('pengampu.kode_matkul', $kode_matkul);
        $builder->where('pengampu.kelas', $kelas);
        $builder->where('pengampu.thn_ajaran', $thn_ajaran);

        $query = $builder->get();
        return $query->getResult();
    }

    function getAssessment($id, $kode_matkul, $kelas, $thn_ajaran)
    {
        $builder = $this->db->table('asesmen');
        $builder->select('asesmen.ID_asesmen, asesmen.nama, asesmen.bobot');
        $builder->join('khs', 'asesmen.ID_asesmen = khs.ID_asesmen');
        $builder->join('pengampu', 'khs.ID_pengampu = pengampu.ID_pengampu');
        $builder->join('matakuliah', 'pengampu.kode_matkul = matakuliah.kode_matkul');
        $builder->join('dosen', 'pengampu.niy_nip = dosen.niy_nip');
        $builder->where('dosen.niy_nip', $id);
        $builder->where('pengampu.kode_matkul', $kode_matkul);
        $builder->where('pengampu.kelas', $kelas);
        $builder->where('pengampu.thn_ajaran', $thn_ajaran);
        $builder->groupBy('asesmen.nama');

        $query = $builder->get();
        return $query->getResult();
    }

    function getcpl($id)
    {
        $builder = $this->db->table('cpl');
        $builder->select('cpl.cpl');
        $builder->join('matakuliah', 'cpl.kode_matkul = matakuliah.kode_matkul');
        $builder->where('matakuliah.kode_matkul', $id);

        $query = $builder->get();
        return $query->getResult();
    }

    function getcpmk($id)
    {
        $builder = $this->db->table('cpmk');
        $builder->select('cpmk.cpmk');
        $builder->join('matakuliah', 'cpmk.kode_matkul = matakuliah.kode_matkul');
        $builder->where('matakuliah.kode_matkul', $id);

        $query = $builder->get();
        return $query->getResult();
    }
}
