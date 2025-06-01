<?php

namespace App\Controllers;

use App\Models\SekolahAsal as ModelsSekolahAsal;
use CodeIgniter\RESTful\ResourceController;

class Sekolahasal extends ResourceController
{
    protected $sekolahAsalModel;

    public function __construct()
    {
        $this->sekolahAsalModel = new ModelsSekolahAsal();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->sekolahAsalModel->get_sekolah();

        if (count($data) === 0) {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data sekolah asal masih kosong!'
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
        //
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
            'sekolah_asal_nama' => $this->request->getVar('nama'),
            'sekolah_asal_alamat' => $this->request->getVar('alamat'),
            'sekolah_asal_notelp' => $this->request->getVar('notelp')
        ];

        $this->sekolahAsalModel->create_sekolah($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data sekolah asal berhasil dibuat!'
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
        $data = [
            'sekolah_asal_nama' => $this->request->getVar('nama'),
            'sekolah_asal_alamat' => $this->request->getVar('alamat'),
            'sekolah_asal_notelp' => $this->request->getVar('notelp')
        ];

        $this->sekolahAsalModel->update_sekolah($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data sekolah asal berhasil diupdate!'
            ]
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
        $this->sekolahAsalModel->delete_sekolah($id);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data sekolah asal berhasil dihapus!'
            ]
        ];

        return $this->respondDeleted($response);
    }
}
