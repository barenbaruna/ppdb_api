<?php

namespace App\Controllers;

use App\Models\Wali as ModelsWali;
use CodeIgniter\RESTful\ResourceController;

class Wali extends ResourceController
{
    protected $waliModel;

    public function __construct()
    {
        $this->waliModel = new ModelsWali();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->waliModel->get_wali();

        if (count($data) === 0) {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data wali masih kosong!'
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
        $data = $this->waliModel->get_wali_by_siswa($id);

        $response = [
            'status' => 200,
            'error' => null,
            'wali' => $data
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
            'wali_siswa_id' => $this->request->getVar('siswa'),
            'wali_fullname' => $this->request->getVar('fullname'),
            'wali_alamat' => $this->request->getVar('alamat'),
            'wali_notelp' => $this->request->getVar('notelp'),
            'wali_pekerjaan' => $this->request->getVar('pekerjaan'),
            'wali_hubungan' => $this->request->getVar('hubungan'),
        ];

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data wali berhasil dibuat!'
            ]
        ];

        $this->waliModel->create_wali($data);

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'wali_fullname' => $this->request->getVar('fullname'),
            'wali_alamat' => $this->request->getVar('alamat'),
            'wali_notelp' => $this->request->getVar('notelp'),
            'wali_pekerjaan' => $this->request->getVar('pekerjaan'),
            'wali_hubungan' => $this->request->getVar('hubungan'),
        ];

        $this->waliModel->update_wali($id, $data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data wali berhasil diupdate!'
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
        $this->waliModel->delete_wali($id);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data wali berhasil dihapus!'
            ],
        ];

        return $this->respondDeleted($response);
    }
}
