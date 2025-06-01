<?php

namespace App\Controllers;

use App\Models\Jurusan as ModelsJurusan;
use CodeIgniter\RESTful\ResourceController;

class Jurusan extends ResourceController
{
    protected $jurusanModel;

    public function __construct()
    {
        $this->jurusanModel = new ModelsJurusan();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->jurusanModel->get_jurusan();

        if (count($data) === 0) {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data jurusan masih kosong!'
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
            'jurusan_nama' => $this->request->getVar('nama')
        ];

        $this->jurusanModel->create_jurusan($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data jurusan berhasil dibuat!'
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
            'jurusan_nama' => $this->request->getVar('nama')
        ];

        $this->jurusanModel->update_jurusan($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data jurusan berhasil diupdate!'
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
        $this->jurusanModel->delete_jurusan($id);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Akun jurusan berhasil dihapus!'
            ],
        ];

        return $this->respondDeleted($response);
    }
}
