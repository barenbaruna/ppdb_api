<?php

namespace App\Controllers;

use App\Models\Pembayaran as ModelsPembayaran;
use App\Models\Pendaftaran;
use CodeIgniter\RESTful\ResourceController;

class Pembayaran extends ResourceController
{
    protected $pembayaranModel;
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pembayaranModel = new ModelsPembayaran();
        $this->pendaftaranModel = new Pendaftaran();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->pembayaranModel->get_pembayaran();

        if (count($data) === 0) {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data pembayaran siswa masih kosong!'
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
        $file = $this->request->getFile('bukti');
        $filename = $file->getName();
        $temp = explode(".",$filename);
		$newfilename = round(microtime(true)) . '.' . end($temp);

        if ($file->move("bukti_pembayaran", $newfilename)) {
            $data = [
                'pembayaran_pendaftaran_id' => $this->request->getVar('pendaftaran'),
                'pembayaran_jumlah' => $this->request->getVar('jumlah'),
                'pembayaran_tanggal' => date('Y-m-d'),
                'pembayaran_metode' => $this->request->getVar('metode'),
                'pembayaran_bukti' => "/bukti_pembayaran/" . $newfilename
            ];

            $data2 = [
                'pendaftaran_status_pembayaran' => 'Lunas'
            ];

            $this->pendaftaranModel->update_pendaftaran($this->request->getVar('pendaftaran'), $data2);
            $this->pembayaranModel->create_pembayaran($data);

            $response = [
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'Pembayaran pendaftaran anda berhasil dilakukan!'
                ]
            ];

            return $this->respondCreated($response);
        } else {
            $response = [
                'status' => 500,
                'error' => 'Internal Server Error!',
                'messages' => [
                    'success' => 'Pembayaran pendaftaran anda gagal dilakukan!'
                ]
            ];
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
