<?php
namespace App\Repositories\Interfaces;

interface PackageRepositoryInterface
{
    public function updatePackage(string $packageType, array $data);
    public function getAllPackages();
}
