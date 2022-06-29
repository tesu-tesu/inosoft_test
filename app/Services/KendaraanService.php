<?php

namespace App\Services;

use App\Repositories\MobilRepository;
use App\Repositories\MotorRepository;
use App\Repositories\PenjualanRepository;
use Carbon\Carbon;
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

    public function __construct(MotorRepository $motor, MobilRepository $mobil, PenjualanRepository $penjualan)
    {
        $this->motor = $motor;
        $this->mobil = $mobil;
        $this->penjualan = $penjualan;
    }

    public function getAll()
    {
        $array = [];
        $array[] = $this->motor->getAll();
        $array[] = $this->mobil->getAll();
        return $array;
    }

    public function getStok()
    {
        $array = [];
        $array[] = $this->motor->getStok();
        $array[] = $this->mobil->getStok();

        $result = json_encode($array, JSON_PRETTY_PRINT);

        return $array;
    }

    public function beli($id)
    {
            $pembelian = [];
            
            $kendaraan = $this->motor->getById($id);
            if (!$kendaraan->all()) {
                $kendaraan = $this->mobil->getById($id);
                $pembelian['jenis'] = 'mobil';
            } 

            if(!$kendaraan->all() || $kendaraan[0]->status_terjual == 0) {
                return false;
            }
            $timenow = Carbon::now()->format('Y-m-d H:i:s');
            $pembelian['id_kendaraan'] = $kendaraan[0]->_id;
            $pembelian['harga'] = $kendaraan[0]->harga;
            $pembelian['tgl_jual'] = $timenow;
            
            $changeStatus = $this->mobil->ubahStatus($id);
            if ($changeStatus == false) {
                $this->motor->ubahStatus($id);
                $pembelian['jenis'] = 'motor';
            }
            $result = $this->penjualan->beli($pembelian);

            return $result;
        
    }

    public function laporan()
    {
        $penjualan = $this->penjualan->getAll();
        
        $motor = [];
        $mobil = [];
        $index_motor = 0;
        $index_mobil = 0;

        foreach ($penjualan as $row) {
            if ($row->jenis == "mobil" ) {
                $mobil[$index_mobil++] = $row;
            }  else {
                $motor[$index_motor++] = $row;
            }
        }

        $array = [];
        $array[] = $motor;
        $array[] = $mobil;

        return $array;
    }
}
