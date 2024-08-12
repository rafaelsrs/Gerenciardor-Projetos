<?php

namespace App\Repositories;

abstract class AbstractRepository implements RepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $registro = $this->model->findOrFail($id);
        return $registro->update($data);
    }

    public function delete($id)
    {
        $registro = $this->model->findOrFail($id);
        return $registro->delete($registro);
    }

    public function all()
    {
        return $this->model->all()->toArray();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
