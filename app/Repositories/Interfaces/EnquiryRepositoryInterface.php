<?php

namespace App\Repositories\Interfaces;

use App\Models\StudentEnquiry;

interface EnquiryRepositoryInterface
{
    public function create(array $data): StudentEnquiry;
    public function getAllWithCount(): array;
    public function addRemark(int $id, string $remark): StudentEnquiry;
}
