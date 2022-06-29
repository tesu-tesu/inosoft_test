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

   public function saveMotorData($data)
   {
      $validator = Validator::make($data, [
         'tahun_keluaran' => 'required',
         'warna' => 'required',
         'harga' => 'required',
         'mesin' => 'required',
         'tipe_suspensi' => 'required',
         'tipe_transmisi' => 'required',
         'status_terjual' => 'required'
      ]);

      if ($validator->fails()) {
         throw new InvalidArgumentException($validator->errors()->first());
      }

      $result = $this->motorRepository->save($data);

      return $result;
   }

   public function getById($id)
   {
      return $this->motorRepository->getById($id);
   }

   public function deleteById($id)
   {

      try {
         $motor = $this->motorRepository->deleteById($id);
      } catch (Exception $e) {
         DB::rollBack();
         Log::info($e->getMessage());

         throw new InvalidArgumentException('Data Tidak Berhasil Dihapus');
      }

      return $motor;
   }
   
   public function updateById($data, $id)
   {
      $validator = Validator::make($data, [
         'tahun_keluaran' => 'required',
         'warna' => 'required',
         'harga' => 'required',
         'mesin' => 'required',
         'tipe_suspensi' => 'required',
         'tipe_transmisi' => 'required',
         'status_terjual' => 'required'
      ]);

      if ($validator->fails()) {
         throw new InvalidArgumentException($validator->errors()->first());
      }

      try {
         $motor = $this->motorRepository->updateById($data, $id);
      } catch (Exception $e) {
         Log::info($e->getMessage());

         throw new InvalidArgumentException('Data Tidak Berhasil Diupdate');
      }

      return $motor;
   }
}
