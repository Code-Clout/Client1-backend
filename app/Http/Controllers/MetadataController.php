<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreMetadataRequest;
use App\Repositories\Interfaces\MetadataRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MetadataController extends Controller
{
    protected $repository;

    public function __construct(MetadataRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): JsonResponse
    {
        $metadata = $this->repository->getAll();

        if ($metadata->isEmpty()) {
            return response()->json(['message' => 'No metadata found.'], 404);
        }

        return response()->json($metadata, 200);
    }

    public function create(StoreMetadataRequest $request): JsonResponse
    {
        $validated = $request->validated();

        // Store the file in public/ directory
        $validated['image_path'] = $request->file('image_path')->store('public/metadata');

        $metadata = $this->repository->create($validated);

        return response()->json(['message' => 'Metadata created successfully.', 'data' => $metadata], 201);
    }

    public function delete($id): JsonResponse
        {
            try {
                $this->repository->delete($id);

                return response()->json(['message' => 'Metadata deleted successfully.'], 200);
            } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
                return response()->json(['message' => $e->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'An error occurred while deleting the metadata.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }

        public function getImageType(Request $request)
        {
            try {
                // Get `type` from query parameters
                $type = $request->query('type');

                if (!$type) {
                    return response()->json(['message' => 'Image type is required'], 400);
                }

                // Validate if the type is valid
                $allowedTypes = ['Certificates', 'RecruiterCompanies', 'GalleryPhoto'];
                if (!in_array($type, $allowedTypes)) {
                    return response()->json(['message' => 'Invalid image type'], 400);
                }

                // Fetch images by type using the repository
                $images = $this->repository->getImagesByType($type);

                if ($images->isEmpty()) {
                    return response()->json(['message' => 'No images found for this type'], 404);
                }

                return response()->json(['images' => $images], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Something went wrong: ' . $e->getMessage()], 500);
            }
        }

}
