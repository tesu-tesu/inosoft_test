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
}

?>