<?php
namespace App\Repositories;

use App\Models\RecognitionAndApproval;
use App\Repositories\Interfaces\RecognitionAndApprovalRepositoryInterface;

class RecognitionAndApprovalRepository implements RecognitionAndApprovalRepositoryInterface
{
    public function all()
    {
        return RecognitionAndApproval::all();
    }

    public function find($id)
    {
        return RecognitionAndApproval::findOrFail($id);
    }

    public function create(array $data)
    {
        return RecognitionAndApproval::create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        if (!$record) {
            throw new \Exception("Record not found.");
        }
        $record->title = $data['title'] ?? $record->title;
        $record->description = $data['description'] ?? $record->description;
        $record->image = $data['image'] ?? $record->image;
        $record->status = $data['status'] ?? $record->status;

        $record->save();  

        return $record;
    }


    public function delete($id)
    {
        $record = $this->find($id);
        return $record->delete();
    }
}
