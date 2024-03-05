<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Models\PenyewaanModel;
use \App\Models\PenyewaanJadwalModel;

class JadwalModel extends Model
{
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id_jadwal';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'start_hour',
        'end_hour',
        'tarif',
        'status'
    ];

    protected $useTimestamps = false;
    protected $validationRules      = [];
    protected $validationMessages   = [];

    /**
     * Get jadwal by date and lapangan
     *
     * @param string $date
     * @param int $lapanganId
     * @return mixed
     */
    public function getJadwalByDateAndLapangan($date, $lapanganId)
    {
        return $this->join('Penyewaan_Jadwal', 'Penyewaan_Jadwal.id_jadwal = Jadwal.id_jadwal')
            ->join('Penyewaan', 'Penyewaan.id_penyewaan = Penyewaan_Jadwal.id_penyewaan')
            ->where('Jadwal.start_hour <=', $date)
            ->where('Jadwal.end_hour >=', $date)
            ->where('Penyewaan.id_lapangan', $lapanganId)
            ->findAll();
    }











    public function getJadwalTimeRange()
    {
        // Ambil rentang waktu yang unik dari database
        $builder = $this->db->table('jadwal');
        $builder->distinct();
        $builder->select('DATE_FORMAT(start_hour, "%H:%i") AS start_time, DATE_FORMAT(end_hour, "%H:%i") AS end_time');
        $timeRanges = $builder->get()->getResult();

        // Format rentang waktu menjadi string yang sesuai
        $formattedTimeRanges = [];
        foreach ($timeRanges as $timeRange) {
            $formattedTimeRanges[] = $timeRange->start_time . " - " . $timeRange->end_time;
        }

        // Ambil jadwal penyewaan untuk rentang waktu yang dipilih
        $penyewaanModel = new PenyewaanModel();
        $bookedTimeRanges = $penyewaanModel->getBookedTimeRanges(); // Metode ini harus Anda definisikan untuk mengambil rentang waktu yang sudah dipesan

        // Filter rentang waktu yang tersedia
        $availableTimeRanges = [];
        foreach ($formattedTimeRanges as $timeRange) {
            if (!in_array($timeRange, $bookedTimeRanges)) {
                $availableTimeRanges[] = $timeRange;
            }
        }

        return $availableTimeRanges;
    }

    public function getPaidJadwal($lapanganId, $tanggal)
    {
        // Mendapatkan jadwal yang sudah dibayar untuk lapangan dan tanggal yang dipilih
        return $this->db->table('Penyewaan_Jadwal')
            ->join('Penyewaan', 'Penyewaan.id_penyewaan = Penyewaan_Jadwal.id_penyewaan')
            ->where('Penyewaan.id_lapangan', $lapanganId)
            ->where('Penyewaan.tanggal_penyewaan', $tanggal)
            ->select('Penyewaan_Jadwal.*')
            ->get()
            ->getResult();
    }
}
