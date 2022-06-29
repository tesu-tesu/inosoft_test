<?php

namespace App\Repositories;

use App\Models\Motor;

class MotorRepository
{
    /**
     * @var Motor
     */
    protected $motor;

    /**
     * MotorReporitory constructor
     * 
     * @param Motor $motor
     */
    public function __construct(Motor $motor)
    {
        $this->motor = $motor;
    }

    public function getAll()
    {
        return $this->motor->get();
    }

    public function save($data)
    {
        $motor = new $this->motor;

        $motor->tahun_kendaraan = $data['tahun_keluaran'];
        $motor->warna = $data['warna'];
        $motor->harga = $data['harga'];
        $motor->mesin = $data['mesin'];
        $motor->tipe_suspensi = $data['tipe_suspensi'];
        $motor->tipe_transmisi = $data['tipe_transmisi'];
        $motor->status_terjual = $data['status_terjual'];
        
        $motor->save();

        return $motor->fresh();
    }

    public function getById($id)
    {
        return $this->motor
            ->where('_id', $id)
            ->get();
    }

    public function deleteById($id)
    {
        $motor = $this->motor->find($id);
        $motor->delete();


        return $motor;
    }
    
    public function updateById($data, $id)
    {
        $motor = $this->motor->find($id);
        
        $motor->tahun_kendaraan = $data['tahun_keluaran'];
        $motor->warna = $data['warna'];
        $motor->harga = $data['harga'];
        $motor->mesin = $data['mesin'];
        $motor->tipe_transmisi = $data['tipe_transmisi'];
        $motor->tipe_suspensi = $data['tipe_suspensi'];
        $motor->status_terjual = $data['status_terjual'];
        
        $motor->update();

        return $motor;
    }

    public function getStok()
    {
        $motor = Motor::where('status_terjual', '=', "1")
            ->get();

        return $motor;
    }

    public function ubahStatus($id)
    {
        if (!$motor = $this->motor->find($id)) {
            return false;
        }
        $motor = $this->motor->find($id);
        $motor->status_terjual = 0; //0 = terjual
        
        $motor->update();
        return true;
    }
}
