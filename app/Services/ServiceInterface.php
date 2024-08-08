<?php
namespace App\Services;

interface ServiceInterface
{
    public function getAll();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
