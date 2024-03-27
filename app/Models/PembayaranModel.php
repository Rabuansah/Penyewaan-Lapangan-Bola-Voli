<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    function getAll()
    {
        $builder = $this->db->table('pembayaran');
        $builder->join('penyewaan', 'penyewaan.id_penyewaan=pembayaran.id_pembayaran');
        $builder->join('users', 'users.id_users=penyewaan.id_users');
        $builder->join('lapangan', 'lapangan.id_lapangan=penyewaan.id_lapangan');
        $builder->join('penyewaan_jadwal', 'penyewaan.id_penyewaan = penyewaan_jadwal.id_penyewaan');
        $builder->join('jadwal', 'penyewaan_jadwal.id_jadwal = jadwal.id_jadwal');
        $query = $builder->get();
        return $query->getResult();
    }
    public function findByPenyewaanId($penyewaanId)
    {
        // Lakukan query ke tabel pembayaran untuk mencari entri dengan id_penyewaan yang sesuai
        // Gantilah 'pembayaran' dengan nama tabel pembayaran yang sesuai dengan struktur database Anda
        $query = $this->db->table('pembayaran')->getWhere(['id_penyewaan' => $penyewaanId]);

        // Kembalikan hasil query sebagai satu baris data atau null jika tidak ada entri yang sesuai
        return $query->getRow();
    }
}
