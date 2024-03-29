<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaanDokumenModel extends Model{
    public function insertData($data){
        $db      = \Config\Database::connect();
        $builder = $db->table('penerimaan_dokumen');
        $builder->insert($data);
        return $db->insertID();
    }

    public function getAllData(){
        $db      = \Config\Database::connect();
        $builder = $db->table('penerimaan_dokumen');
        $builder = $builder->select('*')->where('dihapus_pada', null)->orderBy('dibuat_pada', "DESC");
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getDataById($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('penerimaan_dokumen');
        $builder = $builder->select('*')->where('id', $id)->orderBy('dibuat_pada', "DESC");
        $result = $builder->get()->getResultArray();
        if($result){
            return $result[0];
        }
        return $result;
    }

    public function getAllPenerimaBelumTtdByDate($date){
        $db      = \Config\Database::connect();
        $builder = $db->table('penerimaan_dokumen');
        $builder = $builder->select('nama_penerima')->where('tanggal_diterima', $date)->where('ttd_penerima', NULL);
        $result = $builder->distinct()->get()->getResultArray();
        return $result;
    }

    public function deleteDataById($id){
        $db     = \Config\Database::connect();
        $builder = $db->table('penerimaan_dokumen');
        $builder->where('id', $id);
        return $builder->delete();
    }

    public function updateDataById($id, $data){
        $db     = \Config\Database::connect();
        $builder  = $db->table('penerimaan_dokumen');
        $builder->where('id', $id);
        return $builder->update($data);
    }

    public function updateDataByNamaPenerimaAndTanggalDiterima($namaPenerima, $tanggalDiterima, $data){
        $db     = \Config\Database::connect();
        $builder  = $db->table('penerimaan_dokumen');
        $builder->where('nama_penerima', $namaPenerima)->where('tanggal_diterima', $tanggalDiterima);
        return $builder->update($data);
    }
}