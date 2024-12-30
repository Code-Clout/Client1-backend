<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuestionController extends Controller
{
    protected $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
        $questions = $this->questionRepository->getAll();

        if ($questions->isEmpty()) {
            return response()->json(['message' => 'No questions found.'], 404);
        }

        return response()->json($questions, 200);
    }

    public function show($id)
    {
        try {
            $question = $this->questionRepository->getById($id);
            return response()->json($question, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Question not found.'], 404);
        }
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = $this->questionRepository->create($request->validated());
        return response()->json(['message' => 'Question created successfully.', 'data' => $question], 201);
    }

    public function update(StoreQuestionRequest $request, $id)
    {
        try {
            $question = $this->questionRepository->update($id, $request->validated());
            return response()->json(['message' => 'Question updated successfully.', 'data' => $question], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Question not found.'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->questionRepository->delete($id);
            return response()->json(['message' => 'Question deleted successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Question not found.'], 404);
        }
    }

    public function restore($id)
    {
        try {
            $this->questionRepository->restore($id);
            return response()->json(['message' => 'Question restored successfully.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Question not found.'], 404);
        }
    }

    public function fetchRandom()
    {
        $questions = $this->questionRepository->fetchRandomQuestions(30);

        if ($questions->isEmpty()) {
            return response()->json(['message' => 'No questions found.'], 404);
        }

        return response()->json($questions, 200);
    }

}
