<?php

namespace App\Controllers;
use App\Models\PenerimaanDokumenModel;

class Home extends BaseController
{
    public function index()
    {
        $penerimaanDokumenModel = new PenerimaanDokumenModel();
        $data['allData'] = $penerimaanDokumenModel->getAllData();
        return view('data', $data);
    }

    public function tambah()
    {
        $p = $this->request->getPost();
        if($p){
            $penerimaanDokumenModel = new PenerimaanDokumenModel();
            $insertData = [
                'nama_pengirim' => $p['nama_pengirim'],
                'nomor_dokumen' => $p['nomor_dokumen'],
                'perihal' => $p['perihal'],
                'tanggal_diterima' => $p['tanggal_diterima'],
                'nama_penerima' => $p['nama_penerima'],
                'subdit' => $p['subdit'],
                'ttd_penerima' => empty($p['ttd_penerima']) ? NULL : $p['ttd_penerima'],
            ];
            if($penerimaanDokumenModel->insertData($insertData)){
                return $this->response->setJSON([
                    'error' => false,
                    'message' => "Berhasil menambahkan data penerimaan dokumen.",
                ]);
            } else {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => "Terjadi kegagalan. Silakan coba lagi atau laporkan ke admin.",
                ]);
            }
        }
    }

    public function approve($id){
        $penerimaanDokumenModel = new PenerimaanDokumenModel();
        $updateData = [
            'diapprove_pada' => date("Y-m-d H:i:s"),
            'diubah_pada' => date("Y-m-d H:i:s")
        ];
        if($penerimaanDokumenModel->updateDataById($id, $updateData)){
            session()->setFlashdata('alert', 'berhasil_approve');
            return redirect()->to(base_url());
        } else {
            session()->setFlashdata('alert', 'gagal_coba_lagi');
            return redirect()->to(base_url());
        }
    }

    public function ttd($id){
        $penerimaanDokumenModel = new PenerimaanDokumenModel();
        $p = $this->request->getPost();
        if($p){
            $updateData = [
                'ttd_penerima' => $p['ttd_penerima'],
                'diubah_pada' => date("Y-m-d H:i:s")
            ];
            if($penerimaanDokumenModel->updateDataById($id, $updateData)){
                return $this->response->setJSON([
                    'error' => false,
                    'message' => "Berhasil menambahkan tanda tangan penerima.",
                ]);
            } else {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => "Terjadi kegagalan. Silakan coba lagi atau laporkan ke admin.",
                ]);
            }
        }
    }

    public function hapus($id){
        $penerimaanDokumenModel = new PenerimaanDokumenModel();
        if($penerimaanDokumenModel->deleteDataById($id)){
            session()->setFlashdata('alert', 'berhasil_hapus');
            return redirect()->to(base_url());
        } else {
            session()->setFlashdata('alert', 'gagal_coba_lagi');
            return redirect()->to(base_url());
        }
    }
}
