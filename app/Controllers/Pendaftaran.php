<?php

namespace App\Controllers;

use App\Models\Pendaftaran as ModelsPendaftaran;
use App\Models\Siswa;
use CodeIgniter\RESTful\ResourceController;

class Pendaftaran extends ResourceController
{
    protected $pendaftaranModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->pendaftaranModel = new ModelsPendaftaran();
        $this->siswaModel = new Siswa();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->pendaftaranModel->get_pendaftaran();

        if (count($data) === 0) {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data pendaftaran siswa masih kosong!'
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
        $pendaftaran = $this->pendaftaranModel->get_pendaftaran_by_siswa($id);

        $response = [
            'status' => 200,
            'error' => null,
            'pendaftaran' => $pendaftaran
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
        $siswa_id = $this->request->getVar('siswa');
        $siswa = $this->siswaModel->get_siswa_by_id($siswa_id);

        $data = [
            'pendaftaran_siswa_id' => $siswa_id,
            'pendaftaran_sekolah_asal_id' => $this->request->getVar('sekolah'),
            'pendaftaran_jurusan_id' => $this->request->getVar('jurusan'),
            'pendaftaran_tanggal' => date('Y-m-d'),
            'pendaftaran_status' => ($siswa[0]['siswa_nilai_rata'] >= 85.0 ? 'Diterima' : 'Ditolak')
        ];

        $this->pendaftaranModel->create_pendaftaran($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Pendaftaran berhasil dilakukan. Silahkan cek status pendaftaran anda!'
            ]
        ];

        return $this->respondCreated($response);
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
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
