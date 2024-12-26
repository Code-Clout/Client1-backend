<?php
namespace App\Repositories\Interfaces;

interface GalleryPhotoRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function delete($id);
}
