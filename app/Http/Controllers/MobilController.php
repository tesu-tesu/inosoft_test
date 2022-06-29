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
            $result['data'] = $this->mobilService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errorMessafe' => $e->getMessage(),
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
            $result['data'] = $this->mobilService->saveMobilData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
    
    public function getById($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->mobilService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->mobilService->deleteById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
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
            $result['data'] = $this->mobilService->updateById($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

}
