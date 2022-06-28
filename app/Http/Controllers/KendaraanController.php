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
            $result['data'] = $this->kendaraan->gabungKendaraan();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errorMessafe' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    } 
}
