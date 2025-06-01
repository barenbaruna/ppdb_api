<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'siswa_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'siswa_fullname',
        'siswa_tempat_lahir',
        'siswa_tanggal_lahir',
        'siswa_alamat',
        'siswa_jenis_kelamin',
        'siswa_notelp',
        'siswa_email',
        'siswa_nisn',
        'siswa_nilai_rata',
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

    public function get_siswa ()
    {
        return $this->findAll();
    }

    public function get_siswa_by_id ($siswa_id)
    {
        return $this->where('siswa_id', $siswa_id)->find();
    }

    public function get_siswa_by_nisn ($nisn)
    {
        return $this->where('siswa_nisn', $nisn)->find();
    }

    public function create_siswa ($data)
    {
        return $this->insert($data);
    }

    public function update_siswa ($siswa_id, $data)
    {
        $builder = $this->db->table('siswa');
        $builder->where('siswa_id', $siswa_id);
        $builder->update($data);
    }

    public function delete_siswa ($siswa_id)
    {
        $builder = $this->db->table('siswa');
        $builder->where('siswa_id', $siswa_id);
        $builder->delete();
    }
}
