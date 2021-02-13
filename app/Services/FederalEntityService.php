<?php
namespace App\Services;


use App\Repository\FederalEntityRepository;

class FederalEntityService
{
    protected $repository;

    public function __construct(FederalEntityRepository $repository) {
        $this->repository = $repository;
    }

    public function get($perPage){
        return $this->repository->getAll($perPage);
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




