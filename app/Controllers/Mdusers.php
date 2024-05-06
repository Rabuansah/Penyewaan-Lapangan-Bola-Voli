<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use \App\Models\UsersModel;

class Mdusers extends ResourcePresenter
{
    function __construct()
    {
        $this->users = new UsersModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['users'] = $this->users->getUsers();
        return view('admin/mdusers/index', $data);
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
        return view('auth/login');
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
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data['verified'] = 1;

        $data['role'] = 'user';
        $password = $data['password'];
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);

        $data['token'] = bin2hex(random_bytes(16));
        $this->_sendEmail($data['email'], $data['token']);

        $save = $this->users->insert($data);

        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->users->errors());
        } else {
            return redirect()->to(site_url('auth/login'))->with('warning', 'Anda Sudah Berhasil Mendaftar. Silahkan periksa email Anda untuk instruksi verifikasi.');
        }
    }

    private function _sendEmail($emailAddress, $token)
    {
        $config = [
            'protocol'  => 'smtp',
            'SMTPHost' => 'smtp.gmail.com',
            'SMTPUser' => 'rabuansah5@gmail.com',
            'SMTPPass' => 'vdgvemfnnvaybcey',
            'SMTPPort' => 465,
            'mailType'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
        ];

        $email = \Config\Services::email();
        $email->initialize($config);
        $email->setFrom('rabuansah5@gmail.com', 'Gorca');
        $email->setTo($emailAddress);
        $email->setSubject('Aktivasi Akun Gor Chandra Alkadrie');
        $email->setMessage('Klik link berikut untuk verifikasi akun : <a href="' . site_url('mdusers/verif?email=' . $emailAddress . '&token=' . $token) . '">aktivasi</a>');

        if ($email->send()) {
            return true;
        } else {
            echo "Email tidak dapat dikirim. Pesan kesalahan: " . $email->printDebugger(['headers']);
            return false;
        }
    }

    public function verif()
    {
        $email = $_GET['email'];
        $token = $_GET['token'];
        // Debugging: Cetak nilai $email dan $token untuk memastikan bahwa mereka benar-benar tersedia
        echo "Email: " . $email . "<br>";
        echo "Token: " . $token . "<br>";

        $user = $this->db->get_where('users', ['email' => $email, 'token' => $token])->row_array();
        if ($user) {
            // Debugging: Cetak isi $user untuk memastikan bahwa data pengguna ditemukan
            print_r($user);

            $this->db->where('email', $email)->update('users', ['verified' => 1]);
            // Debugging: Periksa apakah update berhasil dilakukan
            echo "Data berhasil diperbarui";

            return redirect()->to(site_url('auth/login'))->with('success', 'Akun Anda berhasil diverifikasi. Silakan login.');
        } else {
            // Debugging: Jika pengguna tidak ditemukan, mungkin ada masalah dalam kueri atau token tidak cocok
            echo "Pengguna tidak ditemukan atau token tidak cocok";
            return redirect()->back()->withInput()->with('errors', 'Email atau token verifikasi tidak valid.');
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
            return view('admin/mdusers/edit', $data);
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
        $data = $this->request->getPost();

        $this->users->update($id, $data);
        return redirect()->to(site_url('mdusers'))->with('success', 'Data User Berhasil Diupdate');
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
        $this->users->delete($id);
        return redirect()->to(site_url('mdusers'))->with('success', 'Data User Berhasil Dihapus');
    }
}
