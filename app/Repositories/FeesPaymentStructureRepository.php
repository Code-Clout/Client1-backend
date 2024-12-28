<?php
namespace App\Repositories;

use App\Models\FeesPaymentStructure;
use App\Repositories\Interfaces\FeesPaymentStructureRepositoryInterface;

class FeesPaymentStructureRepository implements FeesPaymentStructureRepositoryInterface
{
    public function getAllFees()
    {
        return FeesPaymentStructure::all();
    }

    public function updateFee(int $id, array $data)
    {
        $fee = FeesPaymentStructure::findOrFail($id);
        $fee->update($data);

        return $fee;
    }
}
