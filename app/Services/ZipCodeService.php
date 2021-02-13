<?php
namespace App\Services;


use App\Repository\ZipCodeRepository;
use Illuminate\Support\Facades\Cache;

class ZipCodeService
{
    protected $repository;

    public function __construct(ZipCodeRepository $repository) {
        $this->repository = $repository;
    }

    public function get($perPage){
        return $this->repository->getAll($perPage);
    }
    public function searchByZipCode($zipCode){
        $data = Cache::remember('zipcode.'.$zipCode, 30/60, function ()use($zipCode){
            return $this->repository->searchByZipCode($zipCode);
        });
        return $data;

    }
    public function getOne(int $id){
        return $this->repository->getOne($id);
    }

    public function store(Array $data){
        return $this->repository->save($data);
    }

    public function delete($id){
        return $this->repository->delete($id);
    }
    public function update($id,Array $data){
        return $this->repository->update($id, $data);
    }

}




