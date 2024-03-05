<?php

namespace App\Models;

use CodeIgniter\Model;

class TarifModel extends Model
{
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';

    protected $allowedFields = ['id_lapangan', 'start_hour', 'end_hour', 'rate'];

    protected $returnType = 'object'; // Atau ganti dengan 'array' jika lebih sesuai

    protected $useTimestamps = false; // Sesuaikan dengan kebutuhan Anda

    function getAll()
    {
        $builder = $this->db->table('tarif');
        $builder->join('lapangan', 'lapangan.id_lapangan=tarif.id_lapangan');
        $query = $builder->get();
        return $query->getResult();
    }

    // Validasi untuk input data pada saat penambahan atau pembaruan
    protected $validationRules = [
        'id_lapangan' => 'required|integer',
        'start_hour' => 'required|valid_time',
        'end_hour' => 'required|valid_time',
        'rate' => 'required|integer',
    ];

    protected $validationMessages = [
        'id_lapangan' => [
            'required' => 'ID Lapangan harus diisi.',
            'integer' => 'ID Lapangan harus berupa bilangan bulat.',
        ],
        'start_hour' => [
            'required' => 'Jam mulai harus diisi.',
            'valid_time' => 'Jam mulai harus dalam format waktu yang benar.',
        ],
        'end_hour' => [
            'required' => 'Jam selesai harus diisi.',
            'valid_time' => 'Jam selesai harus dalam format waktu yang benar.',
        ],
        'rate' => [
            'required' => 'Tarif harus diisi.',
            'integer' => 'Tarif harus berupa bilangan bulat.',
        ],
    ];

    protected $skipValidation = false;

    // Jika Anda memiliki relasi dengan tabel lain, Anda dapat mendefinisikan method-method relasi di sini.
}
