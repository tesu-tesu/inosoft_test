<?php 

namespace App\Services;

use App\Repositories\MotorRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Nette\InvalidArgumentException;

class MotorService
{
    /**
     * @var $motorRepository
     */
    protected $motorRepository;

    /**
     * PostService constructor
     * 
     * @param MotorRepository $motorRepository;
     */

     public function __construct(MotorRepository $motorRepository)
     {
        $this->motorRepository = $motorRepository;
     }

     public function getAll()
     {
        return $this->motorRepository->getAll();
     }
}

?>