<?php

namespace App\Repositories;

use App\Models\AlumniSpeak;
use App\Repositories\Interfaces\AlumniSpeakRepositoryInterface;

class AlumniSpeakRepository implements AlumniSpeakRepositoryInterface
{
    public function all()
    {
        return AlumniSpeak::all();
    }

    public function find($id)
    {
        return AlumniSpeak::findOrFail($id);
    }

    public function create(array $data)
    {
        return AlumniSpeak::create($data);
    }

    public function update($id, array $data)
    {
        $alumni = $this->find($id);
        $alumni->update($data);
        return $alumni;
    }

    public function delete($id)
    {
        $alumni = $this->find($id);
        return $alumni->delete();
    }
}
