<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembayaran extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'pembayaran_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pembayaran_pendaftaran_id',
        'pembayaran_jumlah',
        'pembayaran_tanggal',
        'pembayaran_metode',
        'pembayaran_bukti',
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

    public function get_pembayaran_by_pendaftaran ($pendaftaran_id)
    {
        return $this->where('pembayaran_pendaftaran_id', $pendaftaran_id)->find();
    }

    public function get_pembayaran ()
    {
        return $this->findAll();
    }

    public function create_pembayaran ($data)
    {
        return $this->insert($data);
    }

    public function update_pembayaran ($pembayaran_id, $data)
    {
        $builder = $this->db->table('pembayaran');
        $builder->where('pembayaran_id', $pembayaran_id);
        $builder->update($data);
    }

    public function delete_pembayaran ($pembayaran_id)
    {
        $builder = $this->db->table('pembayaran');
        $builder->where('pembayaran_id', $pembayaran_id);
        $builder->delete($pembayaran_id);
    }
}
