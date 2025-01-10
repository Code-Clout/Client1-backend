<?php

namespace App\Repositories;

use App\Models\StudentEnquiry;
use App\Repositories\Interfaces\EnquiryRepositoryInterface;
class EnquiryRepository implements EnquiryRepositoryInterface
{
    public function create(array $data): StudentEnquiry
    {
        return StudentEnquiry::create($data);
    }

    public function getAllWithCount(): array
    {
        $enquiries = StudentEnquiry::all();
        $totalCount = $enquiries->count();

        return [
            'total_count' => $totalCount,
            'enquiries' => $enquiries
        ];
    }
    
    public function addRemark(int $id, string $remark): StudentEnquiry
    {
        $enquiry = StudentEnquiry::findOrFail($id);
        $enquiry->remark = $remark;
        $enquiry->save();
        return $enquiry;
    }

}