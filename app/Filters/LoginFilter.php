<?php

namespace App\Filters;

use App\Models\UsersModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    protected $users;

    public function __construct()
    {
        $this->users = new UsersModel(); // Menginisialisasi model UsersModel
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna belum login dan bukan pada halaman login atau register
        if (!session()->has('id_users') && !in_array(uri_string(), ['login', 'register'])) {
            return redirect()->to(site_url('/login'))->with('error', 'Silakan login untuk mengakses halaman ini.');
        }

        // Periksa apakah pengguna adalah admin
        if (session()->has('id_users')) {
            $user = $this->users->find(session('id_users'));
            if ($user && $user->role !== 'admin' && in_array(uri_string(), ['admin', 'mdadmin', 'mdusers', 'mdjadwal', 'mdlapangan', 'laporan'])) {
                // Jika bukan admin, arahkan mereka ke halaman yang sesuai
                return redirect()->to(site_url('user'));
            }
        }

        return $request;
    }



    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
