<?php
namespace App\Repositories\Interfaces;

interface FeesPaymentStructureRepositoryInterface
{
    public function getAllFees();
    public function updateFee(int $id, array $data);
}
