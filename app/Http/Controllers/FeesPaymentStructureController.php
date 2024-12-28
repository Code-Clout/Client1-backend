<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateFeeRequest;
use App\Repositories\Interfaces\FeesPaymentStructureRepositoryInterface;

class FeesPaymentStructureController extends Controller
{
    protected $repository;

    public function __construct(FeesPaymentStructureRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return response()->json($this->repository->getAllFees());
    }

    public function update(UpdateFeeRequest $request, $id)
    {
        $data = $request->validated();
        $fee = $this->repository->updateFee($id, $data);

        return response()->json($fee);
    }
}
