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
        $this->model->setData($data);
        return $this->model->incluir();
    }

    public function update($data, $id)
    {
        $this->model->setData($data);
        return $this->model->editar($data);
    }

    public function delete($id)
    {
        return $this->model->excluir($id);
    }

    public function all()
    {
        return $this->model->listar();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}
