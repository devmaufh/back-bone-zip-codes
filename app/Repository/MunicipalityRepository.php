<?php
namespace App\Repository;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Municipality;

class MunicipalityRepository implements BaseRepositoryInterface {

    protected $model;

    /**
     * FederalEntityRepository constructor
     * @param $model
     */
    public function __construct(Municipality $model) {
        $this->model = $model;
    }

    public function getAll(int $perPage){
        return $this->model->paginate($perPage);
    }
    public function getOne(int $id){
        return $this->model->findOrFail($id);
    }
    public function save(Array $array){
        return $this->model->create($array);
    }
    public function delete($id){
        $federalEntity = $this->model->findOrFail($id);
        $federalEntity->delete($id);
        return $federalEntity;
    }
    public function update($id, Array $data){
        $federalEntity = $this->model->findOrFail($id);
        $federalEntity->update($data);
        return $federalEntity;
    }
}
