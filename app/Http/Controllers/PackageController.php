<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdatePackageRequest;
use App\Repositories\Interfaces\PackageRepositoryInterface;
use Illuminate\Http\JsonResponse;

class PackageController extends Controller
{
    protected $repository;

    public function __construct(PackageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function update(UpdatePackageRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $package = $this->repository->updatePackage($validated['package_type'], [
                'amount' => $validated['amount'],
            ]);

            return response()->json([
                'message' => 'Package updated successfully.',
                'data' => $package,
            ], 200);
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the package.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
