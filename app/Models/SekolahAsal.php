<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahAsal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sekolah_asal';
    protected $primaryKey       = 'sekolah_asal_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sekolah_asal_nama',
        'sekolah_asal_alamat',
        'sekolah_asal_notelp',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_sekolah ()
    {
        return $this->findAll();
    }

    public function create_sekolah ($data)
    {
        return $this->insert($data);
    }

    public function update_sekolah ($sekolah_asal_id, $data)
    {
        $builder = $this->db->table('sekolah_asal');
        $builder->where('sekolah_asal_id',$sekolah_asal_id);
        $builder->update($data);
    }

    public function delete_sekolah ($sekolah_asal_id)
    {
        $builder = $this->db->table('sekolah_asal');
        $builder->where('sekolah_asal_id', $sekolah_asal_id);
        $builder->delete();
    }
}
