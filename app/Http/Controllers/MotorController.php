<?php

namespace App\Http\Controllers;

use App\Services\MotorService;
use Exception;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    protected $motorService;

    public function __construct(MotorService $motorService)
    {
        $this->motorService = $motorService;
    }

    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diambil";
            $result['data'] = $this->motorService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'tahun_keluaran',
            'warna',
            'harga',
            'mesin',
            'tipe_suspensi',
            'tipe_transmisi',
            'status_terjual'
        ]);
        
        $result = ['status' => 200];
        
        try {
            $result['message'] = "Data Berhasil Ditambahkan";
            $result['data'] = $this->motorService->saveMotorData($data);
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

    public function getById($id)
    {
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diambil";
            $result['data'] = $this->motorService->getById($id);
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
            $result['data'] = $this->motorService->deleteById($id);
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
            'tipe_transmisi',
            'tipe_suspensi',
            'status_terjual'
        ]);
        
        $result = ['status' => 200];

        try {
            $result['message'] = "Data Berhasil Diupdate";
            $result['data'] = $this->motorService->updateById($data, $id);
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
