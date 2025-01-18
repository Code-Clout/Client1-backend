<?php
namespace App\Repositories;

use App\Models\Metadata;
use App\Repositories\Interfaces\MetadataRepositoryInterface;

class MetadataRepository implements MetadataRepositoryInterface
{
    public function getAll()
    {
        return Metadata::whereNull('deleted_at')->get();
    }

    public function create(array $data)
    {
        return Metadata::create($data);
    }

    public function delete(int $id)
    {
        $metadata = Metadata::findOrFail($id);
        return $metadata->delete();
    }

    public function getImagesByType(string $type)
    {
        return Metadata::where('image_type', $type)->get();
    }

}
