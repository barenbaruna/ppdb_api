<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pendaftaran';
    protected $primaryKey       = 'pendaftaran_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pendaftaran_siswa_id',
        'pendaftaran_sekolah_asal_id',
        'pendaftaran_jurusan_id',
        'pendaftaran_tanggal',
        'pendaftaran_status',
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

    public function get_pendaftaran ()
    {
        return $this->findAll();
    }

    public function get_pendaftaran_by_siswa($siswa_id)
    {
        $builder = $this->db->table('pendaftaran');
        $builder->select('pendaftaran.pendaftaran_id, pendaftaran.pendaftaran_tanggal, pendaftaran.pendaftaran_status, pendaftaran.pendaftaran_status_pembayaran, sekolah_asal.sekolah_asal_nama, sekolah_asal.sekolah_asal_alamat, sekolah_asal.sekolah_asal_notelp, jurusan.jurusan_nama');
        $builder->join('sekolah_asal', 'sekolah_asal.sekolah_asal_id = pendaftaran.pendaftaran_sekolah_asal_id');
        $builder->join('jurusan', 'jurusan.jurusan_id = pendaftaran.pendaftaran_jurusan_id');
        $builder->where('pendaftaran.pendaftaran_siswa_id', $siswa_id);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function create_pendaftaran ($data)
    {
        return $this->insert($data);
    }

    public function update_pendaftaran ($pendaftaran_id, $data)
    {
        $builder = $this->db->table('pendaftaran');
        $builder->where('pendaftaran_id', $pendaftaran_id);
        $builder->update($data);
    }

    public function delete_pendaftaran ($pendaftaran_id)
    {
        $builder = $this->db->table('pendaftaran');
        $builder->where('pendaftaran_id', $pendaftaran_id);
        $builder->delete();
    }
}
