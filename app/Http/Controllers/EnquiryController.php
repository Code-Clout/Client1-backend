<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryRequest;
use App\Repositories\Interfaces\EnquiryRepositoryInterface;
use Illuminate\Http\JsonResponse;

class EnquiryController extends Controller
{
    protected $enquiryRepository;

    public function __construct(EnquiryRepositoryInterface $enquiryRepository)
    {
        $this->enquiryRepository = $enquiryRepository;
    }

    public function createEnquiry(EnquiryRequest $request): JsonResponse
    {
        $enquiry = $this->enquiryRepository->create($request->validated());

        return response()->json([
            'message' => 'Enquiry created successfully.',
            'data' => $enquiry,
        ], 201);
    }
    public function getAllEnquiries(): JsonResponse
    {
        $data = $this->enquiryRepository->getAllWithCount();

        return response()->json([
            'total_count' => $data['total_count'],
            'enquiries' => $data['enquiries'],
        ], 200);
    }
}
