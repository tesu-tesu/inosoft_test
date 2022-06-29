<?php 

namespace App\Repositories;

use App\Models\Penjualan;

class PenjualanRepository
{
    /**
     * @var Penjualan
     */
    protected $penjualan;

    /**
     * PenjualanReporitory constructor
     * 
     * @param Penjualan $penjualan
     */
    public function __construct(Penjualan $penjualan)
    {
        $this->penjualan = $penjualan;
    }

    public function beli($data)
    {
        $penjualan = new $this->penjualan;
        
        $penjualan->id_kendaraan = $data['id_kendaraan'];  
        $penjualan->tgl_jual = $data['tgl_jual'];
        $penjualan->harga =$data['harga'];
        $penjualan->jenis =$data['jenis'];

        $penjualan->save();
        return $penjualan->fresh();
    }

    public function getAll()
    {
        return $this->penjualan->get();
    }
}

?>