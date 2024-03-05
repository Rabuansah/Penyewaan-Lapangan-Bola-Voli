<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use \App\Models\LapanganModel;

class Mdlapangan extends ResourcePresenter
{
    function __construct()
    {
        $this->lapangan = new LapanganModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['lapangan'] = $this->lapangan->findAll();
        return view('admin/mdlapangan/index', $data);
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
        session();
        $data['lapangan'] = $this->lapangan->findAll();
        return view('admin/mdlapangan/new', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        session();
        // Validasi input
        $validation = $this->validate([
            'nama_lapangan' => 'required|min_length[3]|max_length[100]',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]|max_size[gambar,2048]',
            'deskripsi' => 'permit_empty'
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $image = $this->request->getFile('gambar');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
        }

        // Data untuk disimpan ke dalam database
        $lapanganData = [
            'nama_lapangan' => $this->request->getPost('nama_lapangan'),
            'gambar' => $newName ?? null,
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        // Simpan data ke dalam database
        $lapanganModel = new \App\Models\LapanganModel();
        $lapanganModel->insert($lapanganData);

        // Redirect ke halaman yang sesuai setelah penyimpanan berhasil
        return redirect()->to(site_url('mdlapangan'))->with('success', 'Lapangan Baru Berhasil Ditambahkan');
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
        $lapangan = $this->lapangan->where('id_lapangan', $id)->first();
        if (is_object($lapangan)) {
            $data['lapangan'] = $lapangan;
            return view('admin/mdlapangan/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
        $lapangan = $this->lapangan->find($id);

        if (!$lapangan) {
            return redirect()->to(site_url('mdlapangan'))->with('error', 'Data Lapangan Tidak Ditemukan');
        }

        $data = $this->request->getPost();

        $image = $this->request->getFile('gambar');
        if ($image !== null && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            if (!empty($lapangan->gambar)) {
                $oldImagePath = ROOTPATH . 'public/uploads/' . $lapangan->gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $data['gambar'] = $newName; // Save the new image name to the database
        }

        $this->lapangan->update($id, $data);

        if (!$data) {
            return redirect()->back()->withInput()->with('errors', $this->lapangan->errors());
        } else {
            return redirect()->to(site_url('mdlapangan'))->with('success', 'Data Lapangan Berhasil Diubah');
        }
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
        $lapangan = $this->lapangan->find($id);

        if (!$lapangan) {
            return redirect()->to(site_url('mdlapangan'))->with('error', 'Data Lapangan Tidak Ditemukan');
        }
        if (!empty($lapangan->gambar)) {
            $imagePath = ROOTPATH . 'public/uploads/' . $lapangan->gambar;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $this->lapangan->delete($id);
        return redirect()->to(site_url('mdlapangan'))->with('success', 'Data Lapangan Berhasil Dihapus');
    }
}
