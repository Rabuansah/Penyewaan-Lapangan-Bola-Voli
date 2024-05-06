<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_users';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;  //berfungsi untuk menghapus sementara
    protected $allowedFields    = [
        'username',
        'email',
        'password',
        'no_hp',
        'role',
        'gambar',
        'alamat',
        'token',
        'verified',
    ];
    public function getAdmin()
    {
        return $this->where('role !=', 'user')->findAll();
    }
    public function getUsers()
    {
        return $this->where('role !=', 'admin')->findAll();
    }

    protected $useTimestamps = true; //berfungsi untuk menampilakn created_at dan updated_at
    public function validationRules(): array
    {
        return [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]', // Confirm password harus cocok dengan password
            'email' => 'required|valid_email|is_unique[users.email]',
            'no_hp' => 'required|min_length[11]|max_length[13]',
            'alamat' => 'required',
        ];
    }
    protected $validationMessages = [
        'username' => [
            'required' => 'Username tidak boleh kosong',
            'min_length' => 'Username minimal 3 karakter',
            'is_unique' => 'Username sudah terdaftar, gunakan username yang berbeda (tambahkan simbol/angka di belakang username)'
        ],
        'password' => [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password minimal 6 karakter',
        ],
        'confirm_password' => [
            'required' => 'Konfirmasi Password tidak boleh kosong',
            'matches' => 'Konfirmasi Password tidak sama dengan password',
        ],
        'email' => [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Berikan alamat email yang valid.',
            'is_unique' => 'Email sudah terdaftar',
        ],
        'no_hp' => [
            'required' => 'Nomor HP tidak boleh kosong',
            'min_length' => 'Berikan No hp yang valid',
            'max_length' => 'Berikan No hp yang valid',
        ],
        'alamat' => [
            'required' => 'Alamat tidak boleh kosong',
        ],
    ];
}
