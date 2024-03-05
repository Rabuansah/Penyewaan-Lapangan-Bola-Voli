<?php

namespace App\Controllers;

use \App\Models\UsersModel;

class Auth extends BaseController
{
    function __construct()
    {
        $this->users = new UsersModel();
    }
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        // if (session('id_users')) {
        //     return redirect()->to(site_url('/'));
        // }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query = $this->users->where('username', $post['username'])->first();

        if ($query) {
            if (password_verify($post['password'], $query->password)) {
                if ($query->verified == 1) { // Periksa apakah pengguna telah diverifikasi
                    // Pengguna telah diverifikasi, izinkan masuk
                    $params = [
                        'id_users' => $query->id_users,
                        'role' => $query->role // Simpan peran pengguna dalam sesi
                    ];
                    session()->set($params);
                    if ($query->role == 'admin') {
                        return redirect()->to(site_url('admin'));
                    } else {
                        return redirect()->to(site_url('user'));
                    }
                } else {
                    // Pengguna belum diverifikasi, tampilkan pesan error
                    return redirect()->back()->withInput()->with('error', 'Akun Anda belum diverifikasi. Silakan cek email Anda untuk instruksi verifikasi.');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Password Salah');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan');
        }
    }



    public function register()
    {
        return view('auth/register');
    }

    public function logout()
    {
        session()->remove('id_users');
        return redirect()->to(site_url('/'));
    }
}




    // public function loginProcess()
    // {
    //     $post = $this->request->getPost();
    //     $query = $this->db->table('users')->getWhere(['username' => $post['username']]);
    //     $user = $query->getRow();

    //     if ($user) {
    //         if (password_verify($post['password'], $user->password)) {
    //             // if ($post['password']) {
    //             $params = ['id_users' => $user->id_users];
    //             session()->set($params);
    //             if ($user->role == 'admin') {
    //                 return redirect()->to(site_url('admin'));
    //             } else {
    //                 return redirect()->to(site_url('user'));
    //             }
    //         } else {
    //             return redirect()->back()->withInput()->with('error', 'Password Salah');
    //         }
    //     } else {
    //         return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan');
    //     }
    // }