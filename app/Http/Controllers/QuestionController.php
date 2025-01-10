<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\RegistrationStudent;
use App\Models\Question;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;


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


    public function submitscore(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:registration_students,id',
        'score' => 'required|integer|min:0',
    ]);

    try {
        $student = RegistrationStudent::findOrFail($request->student_id);

        $student->score = $request->score;
        $student->save();

        return response()->json([
            'message' => 'Score submitted successfully.',
            'student_id' => $student->id,
            'score' => $student->score,
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while submitting the score.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

    public function getScore($studentId)
    {
        $student = RegistrationStudent::findOrFail($studentId);

        if ($student->score === null) {
            return response()->json(['message' => 'Test not taken yet.'], 404);
        }

        $totalQuestions = StudentAnswer::where('student_id', $studentId)->count();
        $correctAnswers = StudentAnswer::where('student_id', $studentId)->where('is_correct', 1)->count();

        return response()->json([
            'student_id' => $studentId,
            'total_questions' => $totalQuestions,
            'correct_answers' => $correctAnswers,
            'score' => $student->score,
        ], 200);
    }

    public function verifyStudent(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
        ]);
    
        $student = RegistrationStudent::where('email', $request->email)
                                      ->where('mobile', $request->mobile)
                                      ->first();
    
        if ($student) {
            if (!is_null($student->score)) {
                return response()->json([
                    'message' => 'This student has already taken the test.',
                ], 400);
            }
    
            return response()->json([
                'message' => 'Student verified successfully.',
                'student' => $student,
            ], 200);
        } else {
            return response()->json([
                'message' => 'No student found with the provided email and mobile.',
            ], 404);
        }
    }
    

}
