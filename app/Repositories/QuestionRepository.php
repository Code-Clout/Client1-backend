<?php
namespace App\Repositories;

use App\Models\Question;
use App\Repositories\Interfaces\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function getAll()
    {
        return Question::all();
    }

    public function getById($id)
    {
        return Question::findOrFail($id);
    }

    public function create(array $data)
    {
        return Question::create($data);
    }

    public function update($id, array $data)
    {
        $question = $this->getById($id);
        $question->update($data);
        return $question;
    }

    public function delete($id)
    {
        $question = $this->getById($id);
        return $question->delete();
    }

    public function restore($id)
    {
        return Question::withTrashed()->findOrFail($id)->restore();
    }

    public function fetchRandomQuestions($count = 30)
    {
        return Question::inRandomOrder()->take($count)->get();
    }

}
