<?php 

namespace App\Repositories;

use App\Models\Mobil;

class MobilRepository
{
    /**
     * @var Mobil
     */
    protected $mobil;

    /**
     * MobilReporitory constructor
     * 
     * @param Mobil $mobil
     */
    public function __construct(Mobil $mobil)
    {
        $this->mobil = $mobil;
    }
    
    public function getAll()
    {
        return $this->mobil->get();
    }

    
    public function save($data)
    {
        $mobil = new $this->mobil;

        $mobil->tahun_kendaraan = $data['tahun_keluaran'];
        $mobil->warna = $data['warna'];
        $mobil->harga = $data['harga'];
        $mobil->mesin = $data['mesin'];
        $mobil->kapasitas_penumpang = $data['kapasitas_penumpang'];
        $mobil->tipe = $data['tipe'];
        $mobil->status_terjual = $data['status_terjual'];
        
        $mobil->save();

        return $mobil->fresh();
    }

    public function getById($id)
    {
        return $this->mobil
            ->where('_id', $id)
            ->get();
    }

    public function deleteById($id)
    {
        $mobil = $this->mobil->find($id);
        $mobil->delete();


        return $mobil;
    }

    public function updateById($data, $id)
    {
        $mobil = $this->mobil->find($id);
        
        $mobil->tahun_kendaraan = $data['tahun_keluaran'];
        $mobil->warna = $data['warna'];
        $mobil->harga = $data['harga'];
        $mobil->mesin = $data['mesin'];
        $mobil->kapasitas_penumpang = $data['kapasitas_penumpang'];
        $mobil->tipe = $data['tipe'];
        $mobil->status_terjual = $data['status_terjual'];
        
        $mobil->update();

        return $mobil;
    }
    
    public function getStok()
    {
        $mobil = Mobil::where('status_terjual', '=', 1)
            ->get();

        return $mobil;
    }

    public function ubahStatus($id)
    {
        if (!$mobil = $this->mobil->find($id)) {
            return false;
        }
        $mobil = $this->mobil->find($id);
        $mobil->status_terjual = 0; //0 = terjual
        
        $mobil->update();
        return true;
    }
}

?>