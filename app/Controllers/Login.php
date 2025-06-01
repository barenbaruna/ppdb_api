<?php

namespace App\Controllers;

use App\Models\Siswa;
use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new Siswa();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
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
        $nisn = $this->request->getVar('nisn');
    
        $data = $this->siswaModel->get_siswa_by_nisn($nisn);
    
        if (count($data) === 1) {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Login berhasil!'
                ],
                'siswa' => $data
            ];
    
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 400,
                'error' => 'Bad Request',
                'messages' => [
                    'failed' => 'Login gagal! NISN belum terdaftar.'
                ]
            ];
    
            return $this->respond($response, 400);
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
