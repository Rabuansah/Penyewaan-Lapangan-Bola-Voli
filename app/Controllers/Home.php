<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use \App\Models\LapanganModel;
use \App\Models\PenyewaanModel;

class Home extends BaseController
{
    public function index()
    {
        $lapanganModel = new LapanganModel();
        $jadwalModel = new JadwalModel();
        $penyewaan = new PenyewaanModel();
        $data['lapangan'] = $lapanganModel->findAll();
        $data['jadwal'] = $jadwalModel->findAll();

        // Pass $jadwalModel to the view
        $data['jadwalModel'] = $jadwalModel;
        $data['penyewaan'] = $penyewaan->getAll();

        return view('index', $data);
    }
}
