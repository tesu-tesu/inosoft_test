<?php

namespace App\Http\Controllers;

use App\Services\KendaraanService;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    protected $kendaraan;

    public function __construct(KendaraanService $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }

    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->kendaraan->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errorMessafe' => $e->getMessage(),
            ];
        }

        return response($result);
    } 

    public function stok()
    {    
        $result = ['status' => 200];

        try {
            $result['data'] = $this->kendaraan->getStok();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errorMessage' => $e->getMessage(),
            ];
        }

        return response($result);
    }

    public function beli($id)
    {
        
        $result = ['status' => 200];

        try {
            $result['data'] = $this->kendaraan->beli($id);
            $result['message'] = "Pembelian Berhasil";
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errorMessage' => $e->getMessage(),
            ];
        }

        return response($result);
    }
}
