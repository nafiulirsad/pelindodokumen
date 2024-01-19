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
        $builder = $builder->select('*')->orderBy('dibuat_pada', "DESC");
        $result = $builder->get()->getResultArray();
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
}