<?php

namespace App\Services;

use App\Repositories\MobilRepository;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Nette\InvalidArgumentException;

class MobilService
{
   /**
    * @var $mobilRepository
    */
   protected $mobilRepository;

   /**
    * PostService constructor
    * 
    * @param MobilRepository $mobilRepository;
    */

   public function __construct(MobilRepository $mobilRepository)
   {
      $this->mobilRepository = $mobilRepository;
   }

   public function getAll()
   {
      return $this->mobilRepository->getAll();
   }

   public function saveMobilData($data)
   {
      $validator = Validator::make($data, [
         'tahun_keluaran' => 'required',
         'warna' => 'required',
         'harga' => 'required',
         'mesin' => 'required',
         'kapasitas_penumpang' => 'required',
         'tipe' => 'required',
         'status_terjual' => 'required'
      ]);

      if ($validator->fails()) {
         throw new InvalidArgumentException($validator->errors()->first());
      }

      $result = $this->mobilRepository->save($data);

      return $result;
   }

   public function getById($id)
   {
      return $this->mobilRepository->getById($id);
   }

   public function deleteById($id)
   {

      try {
         $mobil = $this->mobilRepository->deleteById($id);
      } catch (Exception $e) {
         DB::rollBack();
         Log::info($e->getMessage());

         throw new InvalidArgumentException('Data Tidak Berhasil Dihapus');
      }

      return $mobil;
   }

   public function updateById($data, $id)
   {
      $validator = Validator::make($data, [
         'tahun_keluaran' => 'required',
         'warna' => 'required',
         'harga' => 'required',
         'mesin' => 'required',
         'kapasitas_penumpang' => 'required',
         'tipe' => 'required',
         'status_terjual' => 'required'
      ]);

      if ($validator->fails()) {
         throw new InvalidArgumentException($validator->errors()->first());
      }

      try {
         $mobil = $this->mobilRepository->updateById($data, $id);
      } catch (Exception $e) {
         Log::info($e->getMessage());

         throw new InvalidArgumentException('Data Tidak Berhasil Diupdate');
      }

      return $mobil;
   }
}
