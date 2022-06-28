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
            $result['data'] = $this->motorService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errorMessafe' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }  
}
