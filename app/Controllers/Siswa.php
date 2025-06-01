<?php

namespace App\Controllers;

use App\Models\Siswa as ModelsSiswa;
use CodeIgniter\RESTful\ResourceController;

class Siswa extends ResourceController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new ModelsSiswa();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->siswaModel->get_siswa();

        if (count($data) === 0) {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data siswa masih kosong!'
                ]
            ];

            return $this->respond($response);
        } else {
            return $this->respond($data);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $siswa = $this->siswaModel->get_siswa_by_id($id);

        $response = [
            'status' => 200,
            'error' => null,
            'siswa' => $siswa
        ];

        return $this->respond($response);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {   
        $data = [
            'siswa_fullname' => $this->request->getVar('fullname'),
            'siswa_tempat_lahir' => $this->request->getVar('tempat'),
            'siswa_tanggal_lahir' => $this->request->getVar('tanggal'),
            'siswa_alamat' => $this->request->getVar('alamat'),
            'siswa_jenis_kelamin' => $this->request->getVar('kelamin'),
            'siswa_notelp' => $this->request->getVar('notelp'),
            'siswa_email' => $this->request->getVar('email'),
            'siswa_nisn' => $this->request->getVar('nisn'),
            'siswa_nilai_rata' => $this->request->getVar('nilai'),
        ];

        $nisn = $this->request->getVar('nisn');

        $siswa = $this->siswaModel->get_siswa_by_nisn($nisn);

        if (count($siswa) > 0) {
            $response = [
                'status' => 400,
                'error' => 'Bad Request!',
                'messages' => 'NISN sudah terdaftar. Silahkan login!'
            ];

            return $this->respond($response);
        } else {
            $response = [
                'status' => 201,
                'error' => null,
                'messages' => 'Pendaftaran akun siswa berhasil!'
            ];

            $this->siswaModel->create_siswa($data);

            return $this->respondCreated($response);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'siswa_fullname' => $this->request->getVar('fullname'),
            'siswa_tempat_lahir' => $this->request->getVar('tempat'),
            'siswa_tanggal_lahir' => $this->request->getVar('tanggal'),
            'siswa_alamat' => $this->request->getVar('alamat'),
            'siswa_jenis_kelamin' => $this->request->getVar('kelamin'),
            'siswa_notelp' => $this->request->getVar('notelp'),
            'siswa_email' => $this->request->getVar('email'),
            'siswa_nisn' => $this->request->getVar('nisn'),
            'siswa_nilai_rata' => $this->request->getVar('nilai'),
        ];

        $this->siswaModel->update_siswa($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Akun siswa berhasil diupdate!'
            ],
        ];

        return $this->respondUpdated($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->siswaModel->delete_siswa($id);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Akun siswa berhasil dihapus!'
            ],
        ];

        return $this->respondDeleted($response);
    }
}
