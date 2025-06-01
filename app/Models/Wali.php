<?php

namespace App\Models;

use CodeIgniter\Model;

class Wali extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'wali';
    protected $primaryKey       = 'wali_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'wali_siswa_id',
        'wali_fullname',
        'wali_alamat',
        'wali_notelp',
        'wali_pekerjaan',
        'wali_hubungan',
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

    public function get_wali ()
    {
        return $this->findAll();
    }

    public function get_wali_by_siswa ($siswa_id) {
        return $this->where('wali_siswa_id', $siswa_id)->find();
    }

    public function create_wali ($data)
    {
        return $this->insert($data);
    }

    public function update_wali ($wali_id, $data)
    {
        $builder = $this->db->table('wali');
        $builder->where('wali_id', $wali_id);
        $builder->update($data);
    }

    public function delete_wali ($wali_id)
    {
        $builder = $this->db->table('wali');
        $builder->where('wali_id', $wali_id);
        $builder->delete();
    }
}
