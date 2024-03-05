<?php

namespace App\Controllers;

use \App\Models\PenyewaanModel;
use \App\Models\LapanganModel;
use \App\Models\JadwalModel;
use \App\Models\UsersModel;
use \App\Models\PenyewaanJadwalModel;
use \App\Models\PembayaranModel;
use Config\Services;



class User extends BaseController
{
    function __construct()
    {
        $this->penyewaan = new PenyewaanModel();
        $this->lapangan = new LapanganModel();
        $this->jadwal = new JadwalModel();
        $this->users = new UsersModel();
        $this->penyewaanjadwal = new PenyewaanJadwalModel();
        $this->pembayaran = new PembayaranModel();
    }

    public function index()
    {
        $data = $this->penyewaan->getAll();
        return view('user/index', ['data' => $data]);
    }

    public function lapangan_user()
    {
        //cara 1 : query builder
        $builder = $this->db->table('lapangan');
        $query = $builder->get();

        $data['lapangan'] = $query->getResult();
        return view('user/lapangan/lapangan', $data);
    }

    public function informasi()
    {
        return view('user/informasi/informasi');
    }

    public function booking($id)
    {
        $dataLapangan = $this->lapangan->find($id);
        // Ambil tanggal yang dipilih oleh pengguna dari inputan
        $selectedDate = $this->request->getPost('tanggal_penyewaan');
        $dataPenyewaan = $this->penyewaanjadwal->where('tanggal_penyewaan', $selectedDate);
        $jadwal = $this->jadwal->where('status', 'active')->findAll();
        // Simpan ID lapangan dalam sesi
        session()->set('selected_lapangan', $id);

        // echo $this->db->getLastQuery();
        $getPaidBookings = $this->penyewaan->getPaidBookings();
        // dd($getPaidBookings);
        // $availableBookingDates = $this->penyewaan->getAvailableBookingDates();
        return view('user/lapangan/booking', [
            'lapangan' => $dataLapangan,
            'penyewaan' => $dataPenyewaan,
            'jadwal' => $jadwal,
            'getPaidBookings' => $getPaidBookings,
        ]);
    }

    public function detail_transaksi()
    {
        $data['penyewaanInfo'] = $this->penyewaan->getAll();
        // $penyewaanModel = new PenyewaanModel();
        // $data['penyewaanInfo'] = $penyewaanModel->getPenyewaanInfo();
        // dd($data);

        // usort($data, function ($a, $b) {
        //     return strtotime($a->tanggal_penyewaan) - strtotime($b->tanggal_penyewaan);
        // });
        return view('user/detail_transaksi/detail_transaksi', $data);
    }

    public function proses_sewa()
    {
        $data = $this->request->getPost();
        $isianJadwal = $this->request->getPost();

        $selectedLapangan = session()->get('selected_lapangan');
        $dataLapangan = $this->lapangan->find($selectedLapangan);
        $data['id_lapangan'] = $dataLapangan->id_lapangan;

        $session = Services::session();
        $data['id_users'] = $session->get('id_users');

        $sewa = $this->penyewaan->insert($data);

        $selectedJadwal = $this->request->getPost('jam');

        // Jika nilai terpilih tidak kosong
        if (!empty($selectedJadwal)) {
            // Loop melalui nilai yang dipilih
            foreach ($selectedJadwal as $jadwalId) {
                // Lakukan sesuatu dengan nilai jadwalId (misalnya, simpan ke database)
                echo "Jadwal terpilih: $jadwalId<br>";
                $isianJadwal['id_jadwal'] = $jadwalId;
                $isianJadwal['id_penyewaan'] = $sewa;
                $this->penyewaanjadwal->insert($isianJadwal);
            }
        } else {
            echo "Tidak ada jadwal yang dipilih.";
        }
        return redirect()->to(site_url('detail_transaksi'));
    }

    public function proses_pembayaran()
    {
        $selectedIds = $this->request->getPost('selected_ids');
        if (!empty($selectedIds)) {
            $sewa = $this->penyewaan->getAll(); // Ambil data penyewaan dari model (asumsi $penyewaan adalah model Anda)

            $selectedIdList = []; // Inisialisasi array untuk menyimpan id_penyewaan yang valid dipilih
            $totalSelectedTarif = 0; // Inisialisasi variabel untuk menghitung total tarif yang dipilih

            // $id_order = time();
            foreach ($selectedIds as $selectedId) {
                foreach ($sewa as $sewaItem) {
                    if ($sewaItem->id_penyewaan == $selectedId) { // Periksa apakah id_penyewaan valid
                        $selectedIdList[] = $sewaItem->id_penyewaan;
                        $totalSelectedTarif += $sewaItem->tarif;
                    }
                }
            }

            $token = '';
            if (!empty($selectedIdList)) {
                // $tarif = $this->request->getVar('tarif');
                $id_order = time();

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = 'SB-Mid-server-yY_veDnqri_68P5uk2EJ2cUc';
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $id_order,
                        'gross_amount' => $totalSelectedTarif,
                    ),
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $token = $snapToken;


                $data = [
                    'id_pembayaran' => $id_order,
                    'id_penyewaan' => $selectedIdList,
                    'jumlah' => $totalSelectedTarif,
                    'token' => $token,
                ];
                $this->pembayaran->insert($data);
            }

            $url = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $token;
            // Gunakan selectedIdList untuk proses selanjutnya, seperti penyimpanan atau operasi lain
            // Gunakan $totalSelectedTarif untuk menghitung total tarif yang dipilih

        } else {
            // Tidak ada id yang dipilih, lakukan penanganan sesuai kebutuhan Anda
        }

        return redirect()->to($url);
    }

    // public function waktuBooking()
    // {
    //     if ($this->request->isAjax()) {
    //         $selected_date = $this->request->getPost('selected_date');

    //         $penyewaan = new PenyewaanModel();
    //         $data = [
    //             'datawaktu' => $penyewaan->tampilWaktu($selected_date)
    //         ];

    //         $json = [
    //             'data' => view('/user/lapangan/waktubooking', $data)
    //         ];
    //         echo json_encode($json);
    //     } else {
    //         return redirect()->back()->with('error', 'Permintaan tidak valid');
    //     }
    //     // if ($this->request->isAjax()) {
    //     //     $selectedDate = $this->request->getPost('selected_date');

    //     //     // Panggil model atau lakukan query ke database untuk mendapatkan jadwal booking yang tersedia sesuai dengan tanggal yang dipilih
    //     //     $availableTimes = $this->penyewaan->getAvailableBookingTimes($selectedDate);

    //     //     // Kembalikan data dalam format JSON
    //     //     return $this->response->setJSON($availableTimes);
    //     // } else {
    //     //     // Handle jika bukan permintaan AJAX
    //     //     return redirect()->back()->with('error', 'Permintaan tidak valid');
    //     // }
    // }
}
