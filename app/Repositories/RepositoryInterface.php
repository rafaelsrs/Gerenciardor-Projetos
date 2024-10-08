<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function all();

    public function find($id);
}
