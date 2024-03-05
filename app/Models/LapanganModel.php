<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;
use CodeIgniter\Database\ConnectionInterface;

class LapanganModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'lapangan';
    protected $primaryKey       = 'id_lapangan';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lapangan',
        'gambar',
        'deskripsi',
    ];

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    //Validation
    // public function validationRules(): array
    // {
    //     return [
    //         'nama_lapangan'      => 'required|min_length[3]|max_length[100]',
    //         'gambar'             => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'deskripsi'          => 'permit_empty', // Deskripsi boleh kosong
    //     ];
    // }

    // protected $validationMessages   = [
    //     'nama_lapangan'     => [
    //         'required'      => 'Nama lapangan harus diisi.',
    //         'min_length'    => 'Nama lapangan minimal 3 karakter.',
    //         'max_length'    => 'Nama lapangan maksimal 100 karakter.',
    //     ],
    //     'gambar'            => [
    //         'required'      => 'Gambar harus diisi.',
    //         'max_length'    => 'Panjang nama file gambar maksimal 255 karakter.',
    //     ],
    // ];
    // public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null)
    // {
    //     parent::__construct($db, $validation);
    // }
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    // protected $validationRules = [
    //     'nama_lapangan' => 'required',
    //     'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpeg,image/png]|max_size[gambar,1024]', // Adjust the max_size as needed
    // ];

    // protected $validationMessages = [
    //     'gambar' => [
    //         'uploaded' => 'Please select an image to upload.',
    //         'mime_in' => 'Only JPEG or PNG images are allowed.',
    //         'max_size' => 'The image size must be less than 1024 KB.',
    //     ],
    // ];
}
