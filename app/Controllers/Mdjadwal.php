<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use \App\Models\JadwalModel;

class Mdjadwal extends ResourcePresenter
{
    function __construct()
    {
        $this->jadwal = new JadwalModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['jadwal'] = $this->jadwal->findAll();
        return view('admin/mdjadwal/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
    public function proses_simpan()
    {

        $checkedJadwal = $this->request->getPost('checked_jadwal');

        if (!empty($checkedJadwal)) {
            foreach ($checkedJadwal as $jadwalId) {
                $jadwal = $this->jadwal->find($jadwalId); // Ambil data jadwal dari database
                if ($jadwal) {
                    $newStatus = ($jadwal->status === 'active') ? 'nonactive' : 'active'; // Ubah status berdasarkan status saat ini
                    $this->jadwal->update($jadwalId, ['status' => $newStatus]);
                }
            }
            return redirect()->to(site_url('mdjadwal'))->withInput()->with('success', 'Status berhasil diperbarui.');
        }
    }
}
