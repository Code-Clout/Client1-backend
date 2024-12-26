<?php

namespace App\Repositories;

use App\Models\GalleryPhoto;
use App\Repositories\Interfaces\GalleryPhotoRepositoryInterface;

class GalleryPhotoRepository implements GalleryPhotoRepositoryInterface
{
    public function all()
    {
        return GalleryPhoto::whereNull('deleted_at')->get();
    }

    public function create(array $data)
    {
        return GalleryPhoto::create($data);
    }

    public function delete($id)
    {
        $photo = GalleryPhoto::findOrFail($id);
        return $photo->delete();
    }
}
