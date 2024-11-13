<?php

namespace App\Repositories\Interfaces;

use App\Models\StudentEnquiry;

interface EnquiryRepositoryInterface
{
    public function create(array $data): StudentEnquiry;
}
