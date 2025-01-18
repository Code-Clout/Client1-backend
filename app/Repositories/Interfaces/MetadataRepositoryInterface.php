<?php
namespace App\Repositories\Interfaces;

interface MetadataRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function delete(int $id);
    public function getImagesByType(string $type);
}
