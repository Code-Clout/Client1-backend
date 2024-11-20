<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Repositories\Interfaces\AnnouncementRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AnnouncementController extends Controller
{
    protected $repository;

    public function __construct(AnnouncementRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $announcements = $this->repository->all();
        if ($announcements->isEmpty()) {
            return response()->json(['message' => 'No announcements found.'], 404);
        }
        return response()->json($announcements, 200);
    }

    public function show($id)
    {
        try {
            $announcement = $this->repository->find($id);
            return response()->json($announcement, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Announcement not found.'], 404);
        }
    }

    public function store(StoreAnnouncementRequest $request)
    {
        $data = $request->validated();
        $this->repository->create($data);
        return response()->json(['message' => 'Announcement created successfully!'], 201);
    }

    public function update(UpdateAnnouncementRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $announcement = $this->repository->update($id, $data);
            return response()->json(['message' => 'Announcement updated successfully.', 'data' => $announcement], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Announcement not found.'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->repository->delete($id);
            return response()->json(['message' => 'Announcement deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Announcement not found.'], 404);
        }
    }
}
