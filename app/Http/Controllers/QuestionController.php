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


    public function submitAnswers(Request $request)
    {
        $studentId = $request->input('student_id');
        $answers = $request->input('answers'); 

        $correctCount = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $answer) {
            $question = Question::findOrFail($answer['question_id']);
            $isCorrect = false;

            foreach ($question->options as $option) {
                if ($option['option_text'] === $answer['selected_option'] && $option['is_correct']) {
                    $isCorrect = true;
                    break;
                }
            }
            StudentAnswer::create([
                'student_id' => $studentId,
                'question_id' => $answer['question_id'],
                'is_correct' => $isCorrect,
            ]);

            if ($isCorrect) {
                $correctCount++;
            }
        }

        $score = $correctCount;
        $student = RegistrationStudent::findOrFail($studentId);
        $student->update(['score' => $score]);

        return response()->json([
            'message' => 'Answers submitted successfully.',
            'correct_answers' => $correctCount,
            'total_questions' => $totalQuestions,
            'score' => $score,
        ], 200);
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
