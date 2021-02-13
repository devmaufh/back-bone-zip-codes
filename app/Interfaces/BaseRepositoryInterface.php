<?php
namespace App\Interfaces;

interface BaseRepositoryInterface {
    public function getAll(int $perPage);
    public function getOne(int $id);
    public function save(Array $array);
    public function delete($id);
    public function update($id, Array $data);
}
