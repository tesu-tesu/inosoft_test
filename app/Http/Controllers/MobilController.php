<?php

namespace App\Http\Controllers;

use App\Services\MobilService;
use Exception;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    protected $mobilService;

    public function __construct(MobilService $mobilService)
    {
        $this->mobilService = $mobilService;
    }

    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diambil";
            $result['data'] = $this->mobilService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }
    
    public function store(Request $request)
    {
        $data = $request->only([
            'tahun_keluaran',
            'warna',
            'harga',
            'mesin',
            'kapasitas_penumpang',
            'tipe',
            'status_terjual'
        ]);
        
        $result = ['status' => 200];
        
        try {
            $result['message'] = "Data Berhasil Ditambahkan";
            $result['data'] = $this->mobilService->saveMobilData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
    
    public function getById($id)
    {
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diambil";
            $result['data'] = $this->mobilService->getById($id);
            if (!$result['data']) {
                throw new Exception('gagal');
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Dihapus";
            $result['data'] = $this->mobilService->deleteById($id);
            if (!$result['data']) {
                throw new Exception('gagal');
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'tahun_keluaran',
            'warna',
            'harga',
            'mesin',
            'kapasitas_penumpang',
            'tipe',
            'status_terjual'
        ]);
        
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diupdate";
            $result['data'] = $this->mobilService->updateById($data, $id);
            if (!$result['data']) {
                throw new Exception('gagal');
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

}
