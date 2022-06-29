<?php

namespace App\Http\Controllers;

use App\Services\KendaraanService;
use Exception;
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
            $result['message'] = "Data Berhasil Diambil";
            $result['data'] = $this->kendaraan->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    } 

    public function stok()
    {    
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diambil";
            $result['data'] = $this->kendaraan->getStok();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function beli($id)
    {
        
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diupdate";
            $result['data'] = $this->kendaraan->beli($id);
            if (!$result['data']) {
                throw new Exception('gagal');
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function laporan()
    {
        $result = ['status' => 200];
        
        try {
            $result['message'] = "Laporan Berhasil";
            $result['data'] = $this->kendaraan->laporan();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }
        
        return response()->json($result, $result['status']);
    }
}
