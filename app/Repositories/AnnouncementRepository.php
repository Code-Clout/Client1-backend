<?php

namespace App\Repositories;

use App\Models\Announcement;
use App\Repositories\Interfaces\AnnouncementRepositoryInterface;

class AnnouncementRepository implements AnnouncementRepositoryInterface
{
    public function all()
    {
        return Announcement::all();
    }

    public function find($id)
    {
        return Announcement::findOrFail($id);
    }

    public function create(array $data)
    {
        return Announcement::create($data);
    }

    public function update($id, array $data)
    {
        $announcement = $this->find($id);
        $announcement->update($data);
        return $announcement;
    }

    public function delete($id)
    {
        $announcement = $this->find($id);
        return $announcement->delete();
    }
}
