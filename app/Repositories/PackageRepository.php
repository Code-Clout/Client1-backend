<?php
namespace App\Repositories;

use App\Models\Package;
use App\Repositories\Interfaces\PackageRepositoryInterface;

class PackageRepository implements PackageRepositoryInterface
{
    public function updatePackage(string $packageType, array $data)
    {
        $package = Package::where('package_type', $packageType)->first();
    
        if (!$package) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("Package with type '{$packageType}' not found.");
        }
    
        $package->update($data);
        return $package;
    }
    
    public function getAllPackages()
    {
        return Package::all(); 
    }
}
