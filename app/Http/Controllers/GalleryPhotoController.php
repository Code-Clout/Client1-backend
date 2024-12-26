<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryPhotoRequest;
use App\Repositories\Interfaces\GalleryPhotoRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GalleryPhotoController extends Controller
{
    protected $repository;

    public function __construct(GalleryPhotoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPhotos()
    {
        $photos = $this->repository->all();

        if ($photos->isEmpty()) {
            return response()->json(['message' => 'No gallery photos found.'], 404);
        }

        return response()->json($photos, 200);
    }

    public function createPhoto(StoreGalleryPhotoRequest $request)
    {
        $data = $request->validated();
        $data['gallery_photo'] = $request->file('gallery_photo')->store('gallery_photos');

        $this->repository->create($data);

        return response()->json(['message' => 'Gallery photo created successfully!'], 201);
    }

    public function deletePhoto($id)
    {
        try {
            $this->repository->delete($id);

            return response()->json(['message' => 'Gallery photo deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Gallery photo not found.'], 404);
        }
    }
}

