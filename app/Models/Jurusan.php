<?php

namespace App\Models;

use CodeIgniter\Model;

class Jurusan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jurusan';
    protected $primaryKey       = 'jurusan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jurusan_nama'
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

    public function get_jurusan ()
    {
        return $this->findAll();
    }

    public function create_jurusan ($data)
    {
        return $this->insert($data);
    }

    public function update_jurusan ($jurusan_id, $data)
    {
        $builder = $this->db->table('jurusan');
        $builder->where('jurusan_id', $jurusan_id);
        $builder->update($data);
    }

    public function delete_jurusan ($jurusan_id)
    {
        $builder = $this->db->table('jurusan');
        $builder->where('jurusan_id', $jurusan_id);
        $builder->delete();
    }
}
