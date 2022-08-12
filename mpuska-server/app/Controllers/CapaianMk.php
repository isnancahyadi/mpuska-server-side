<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CapaianMkModel;
use App\Models\CapaianModel;
use App\Models\MatakuliahModel;

use CodeIgniter\API\ResponseTrait;

class CapaianMk extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        helper(['restclient']);

        $this->cpl = new CapaianModel();
        $this->matkul = new MatakuliahModel();
    }

    public function index()
    {
        //
    }

    public function tampil()
    {
        $url = site_url('restapi/capaianmk');
        $data = [];
        $response['cpmk'] = akses_restapi('GET', $url, $data);

        return view('pencapaian/matakuliah/index', (array)$response);
    }

    public function add()
    {
        $data['cpl'] = $this->cpl->getAll();
        $data['matkul'] = $this->matkul->getAll();

        return view('pencapaian/matakuliah/new', $data);
    }

    public function store()
    {
        $validate = $this->validate([
            'kode_matkul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode matakuliah tidak boleh kosong'
                ],
            ],
            'ID_cpl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'CPL tidak boleh kosong'
                ],
            ],
            'cpmk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'CPMK tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();

        // $cpl = [
        //     'kode_matkul' => $data['kode_matkul'],
        //     'cpl' => $data['ID_cpl']
        // ];

        // $cpmk = [
        //     'kode_matkul' => $data['kode_matkul'],
        //     'cpmk' => $data['ID_cpmk']
        // ];

        $url = site_url('restapi/capaianmk');
        akses_restapi('POST', $url, $data);

        return redirect()->to(site_url('capaianmk/tampil'))->with('success', 'Data Berhasil Disimpan');
        //var_dump($data['cpmk']);
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $this->cpmk = new CapaianMkModel();
            $data['cpmk'] = $this->cpmk->getSpecifiedCourse($id);
            // $builderCpl = $this->db->table('cpl');
            // $builderCpl->select('capaian_lulusan.KEY_cpl, cpl.ID_cpl, cpl.cpl');
            // $builderCpl->join('capaian_lulusan', 'cpl.ID_cpl = capaian_lulusan.ID_cpl');
            // $queryCpl = $builderCpl->get();

            $data['cpl'] = $this->cpl->getAll();
            $data['matkul'] = $this->matkul->getAll();
            //return $this->respond($data['cpl']);
            //var_dump($data);

            if ($this->cpmk->affectedRows() > 0) {
                foreach ($data['cpmk'] as $key => $value) {
                    $value->capaian_lulusan = $this->cpmk->getCpl($id);
                    $value->capaian_matakuliah = $this->cpmk->getCpmk($id);
                }
                return view('pencapaian/matakuliah/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

            // return $this->respond($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'kode_matkul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode matakuliah tidak boleh kosong'
                ],
            ],
            'cpl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'CPL tidak boleh kosong'
                ],
            ],
            'cpmk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'CPMK tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        return $this->respond($data);
        //var_dump($data);
        $url = site_url('restapi/capaianmk/' . $id);
        akses_restapi('PUT', $url, $data);

        return redirect()->to(site_url('capaianmk/tampil'))->with('success', 'Data Berhasil Diupdate');
    }
}
