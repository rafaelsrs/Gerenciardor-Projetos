<?php

namespace App\Services;

abstract class AbstractService implements ServiceInterface
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
}
