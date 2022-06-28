<?php 

namespace App\Repositories;

use App\Models\Motor;

class KendaraanRepository
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
}

?>