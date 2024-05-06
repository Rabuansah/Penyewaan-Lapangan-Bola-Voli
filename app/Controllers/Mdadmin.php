<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use CodeIgniter\RESTful\ResourcePresenter;
use \App\Models\UsersModel;

class Mdadmin extends ResourcePresenter
{
    function __construct()
    {
        $this->users = new UsersModel();
        $this->pembayaran = new PembayaranModel();
        $this->db      = \Config\Database::connect();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['users'] = $this->users->getAdmin();
        return view('admin/mdadmin/index', $data);
    }
    public function dashboard()
    {
        $query = $this->db->table('pembayaran')->selectSum('jumlah')->get();
        $result = $query->getRow();

        $totalAmount = $result->jumlah;

        $data = array(
            'totalAmount' => $totalAmount,
        );

        $userData = $this->db->table('users')->get()->getResult();
        $totalAdmin = 0;
        $totalUser = 0;

        foreach ($userData as $row) {
            if ($row->role === 'admin') {
                $totalAdmin++;
            } elseif ($row->role === 'user') {
                $totalUser++;
            }
        }

        // Gabungkan data ke dalam satu array
        $data['totalAdmin'] = $totalAdmin;
        $data['totalUser'] = $totalUser;

        return view('admin/dashboard', $data);
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
        $data['users'] = $this->users->findAll();
        return view('admin/mdadmin/new', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        if (!$this->validate($this->users->validationRules(), $this->users->validationMessages)) {
            return
                redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data['verified'] = 1;

        $data['role'] = 'admin';
        $password = $data['password'];
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        // $data['role'] = 'user';

        $image = $this->request->getFile('gambar');
        if ($image !== null && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/admin', $newName);
            $data['gambar'] = $newName; // Save the image name to the database
        }

        $save = $this->users->insert($data);

        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->users->errors());
        } else {
            return redirect()->to(site_url('mdadmin'))->with('success', 'Data Berhasil Ditambahkan');
        }
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
        $users = $this->users->where('id_users', $id)->first();
        if (is_object($users)) {
            $data['users'] = $users;
            return view('admin/mdadmin/edit', $data);
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
        $users = $this->users->find($id);

        if (!$users) {
            return redirect()->to(site_url('mdusers'))->with('error', 'Data Tidak Ditemukan');
        }

        $data = $this->request->getPost();

        $image = $this->request->getFile('gambar');
        if ($image !== null && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/admin', $newName);

            if (!empty($users->gambar)) {
                $oldImagePath = ROOTPATH . 'public/uploads/admin/' . $users->gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $data['gambar'] = $newName; // Save the new image name to the database
        }

        $this->users->update($id, $data);
        if (!$data) {
            return redirect()->back()->withInput()->with('errors', $this->users->errors());
        } else {
            return redirect()->to(site_url('mdadmin'))->with('success', 'Data Admin Berhasil Diubah');
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
        $users = $this->users->find($id);

        if (!$users) {
            return redirect()->to(site_url('mdusers'))->with('error', 'Data Lapangan Tidak Ditemukan');
        }

        if (!empty($users->gambar)) {
            $imagePath = ROOTPATH . 'public/uploads/admin/' . $users->gambar;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $this->users->delete($id);
        return redirect()->to(site_url('mdadmin'))->with('success', 'Data Berhasil Dihapus');
    }
}
