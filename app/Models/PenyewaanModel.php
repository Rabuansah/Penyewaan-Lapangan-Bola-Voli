<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Models\JadwalModel;

class PenyewaanModel extends Model
{
    protected $table            = 'penyewaan';
    protected $primaryKey       = 'id_penyewaan';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'id_users',
        'id_lapangan',
        'tanggal_penyewaan',
        'kategori',
        'status_pembayaran',
    ];

    protected $useTimestamps = true;

    function getAll()
    {
        $builder = $this->db->table('penyewaan');
        $builder->join('users', 'users.id_users=penyewaan.id_users');
        $builder->join('lapangan', 'lapangan.id_lapangan=penyewaan.id_lapangan');
        $builder->join('Penyewaan_Jadwal', 'Penyewaan.id_penyewaan = Penyewaan_Jadwal.id_penyewaan');
        $builder->join('Jadwal', 'Penyewaan_Jadwal.id_jadwal = Jadwal.id_jadwal');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getAvailableBookingDates()
    {
        return $this->db->table('penyewaan')
            ->select('penyewaan.id_penyewaan, penyewaan.tanggal_penyewaan, jadwal.start_hour, jadwal.end_hour')
            ->join('penyewaan_jadwal', 'penyewaan.id_penyewaan = penyewaan_jadwal.id_penyewaan')
            ->join('jadwal', 'penyewaan_jadwal.id_jadwal = jadwal.id_jadwal')
            ->join('pembayaran', 'penyewaan.id_penyewaan = pembayaran.id_penyewaan', 'left')
            ->where('pembayaran.id_pembayaran', null) // Hanya ambil yang belum dibayar
            ->get()
            ->getResult();
    }

    public function getPaidBookings()
    {
        return $this->select('p.id_pembayaran, p.id_penyewaan, l.id_lapangan, py.tanggal_penyewaan, j.id_jadwal')
            ->from('pembayaran p ')
            ->join('penyewaan py ', 'p.id_penyewaan = py.id_penyewaan ', 'left')
            ->join('lapangan l ', 'py.id_lapangan = l.id_lapangan ')
            ->join('penyewaan_jadwal pj', 'py.id_penyewaan = pj.id_penyewaan')
            ->join('jadwal j', 'pj.id_jadwal = j.id_jadwal')
            ->where('p.id_pembayaran IS NOT NULL')
            ->get()
            ->getResult();
    }

    public function getBookedTimeRanges()
    {
        $builder = $this->db->table('penyewaan_jadwal');
        $builder->select('jadwal.start_hour AS start_time, jadwal.end_hour AS end_time');
        $builder->join('jadwal', 'penyewaan_jadwal.id_jadwal = jadwal.id_jadwal', 'left');
        $builder->join('penyewaan', 'penyewaan_jadwal.id_penyewaan = penyewaan.id_penyewaan', 'left');
        $builder->where('penyewaan.tanggal_penyewaan', date('Y-m-d')); // Ubah sesuai dengan kebutuhan Anda, misalnya hanya untuk tanggal hari ini
        $bookedTimeRanges = $builder->get()->getResult();

        $formattedBookedTimeRanges = [];
        foreach ($bookedTimeRanges as $timeRange) {
            $formattedBookedTimeRanges[] = $timeRange->start_time . " - " . $timeRange->end_time;
        }

        return $formattedBookedTimeRanges;
    }

    public function updatePaymentStatus($id_penyewaan)
    {
        return $this->set('status_pembayaran', true)
            ->where('id_penyewaan', $id_penyewaan)
            ->update();
    }

    public function deleteUnpaidBookings($timeLimit)
    {
        $this->db->transStart();

        // Calculate the time limit
        $limit = date('Y-m-d H:i:s', strtotime("-$timeLimit minutes"));

        // Get unpaid bookings that exceed the time limit
        $unpaidBookings = $this->select('id_penyewaan')
            ->where('status_pembayaran', false)
            ->where('created_at <', $limit)
            ->get()
            ->getResult();

        // Delete unpaid bookings
        foreach ($unpaidBookings as $booking) {
            $this->where('id_penyewaan', $booking->id_penyewaan)->delete();
        }

        $this->db->transComplete();

        return $this->db->transStatus();
    }
}
