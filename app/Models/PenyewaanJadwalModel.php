<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaanJadwalModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'penyewaan_jadwal';
    protected $primaryKey       = 'id_penyewaan_jadwal';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'id_penyewaan',
        'id_jadwal',
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalModel::class, 'id_jadwal');
    }

    protected $useTimestamps = false;
}
