<?php

namespace App\Services;

use App\Repositories\MobilRepository;
use App\Repositories\MotorRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Nette\InvalidArgumentException;

class KendaraanService
{
    protected $motor;
    protected $mobil;
    protected $kendaraan;

    public function __construct(MotorRepository $motor, MobilRepository $mobil)
    {
        $this->motor = $motor;
        $this->mobil = $mobil;
    }

    public function getAll()
    {
        return $this->motor->getAll();
    }

    public function gabungKendaraan()
    {
        $array = [];
        $array[0] = $this->motor->getAll();
        $array[1] = $this->mobil->getAll();

        return $array;
    }
}
