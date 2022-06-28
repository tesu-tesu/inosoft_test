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
}

?>