<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'question_text' => 'What is the capital of France?',
                'options' => [
                    ['option_text' => 'Paris', 'is_correct' => true],
                    ['option_text' => 'Berlin', 'is_correct' => false],
                    ['option_text' => 'Madrid', 'is_correct' => false],
                    ['option_text' => 'Rome', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Which planet is known as the Red Planet?',
                'options' => [
                    ['option_text' => 'Mars', 'is_correct' => true],
                    ['option_text' => 'Venus', 'is_correct' => false],
                    ['option_text' => 'Jupiter', 'is_correct' => false],
                    ['option_text' => 'Saturn', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the capital of France?',
                'options' => [
                    ['option_text' => 'Paris', 'is_correct' => true],
                    ['option_text' => 'Berlin', 'is_correct' => false],
                    ['option_text' => 'Madrid', 'is_correct' => false],
                    ['option_text' => 'Rome', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Which planet is known as the Red Planet?',
                'options' => [
                    ['option_text' => 'Mars', 'is_correct' => true],
                    ['option_text' => 'Venus', 'is_correct' => false],
                    ['option_text' => 'Jupiter', 'is_correct' => false],
                    ['option_text' => 'Saturn', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the chemical symbol for water?',
                'options' => [
                    ['option_text' => 'H2O', 'is_correct' => true],
                    ['option_text' => 'O2', 'is_correct' => false],
                    ['option_text' => 'CO2', 'is_correct' => false],
                    ['option_text' => 'H2', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who wrote "Romeo and Juliet"?',
                'options' => [
                    ['option_text' => 'William Shakespeare', 'is_correct' => true],
                    ['option_text' => 'Charles Dickens', 'is_correct' => false],
                    ['option_text' => 'Mark Twain', 'is_correct' => false],
                    ['option_text' => 'Jane Austen', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the largest ocean on Earth?',
                'options' => [
                    ['option_text' => 'Pacific Ocean', 'is_correct' => true],
                    ['option_text' => 'Atlantic Ocean', 'is_correct' => false],
                    ['option_text' => 'Indian Ocean', 'is_correct' => false],
                    ['option_text' => 'Arctic Ocean', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who painted the Mona Lisa?',
                'options' => [
                    ['option_text' => 'Leonardo da Vinci', 'is_correct' => true],
                    ['option_text' => 'Michelangelo', 'is_correct' => false],
                    ['option_text' => 'Vincent van Gogh', 'is_correct' => false],
                    ['option_text' => 'Pablo Picasso', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'How many continents are there?',
                'options' => [
                    ['option_text' => '7', 'is_correct' => true],
                    ['option_text' => '5', 'is_correct' => false],
                    ['option_text' => '6', 'is_correct' => false],
                    ['option_text' => '8', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Which gas do plants absorb during photosynthesis?',
                'options' => [
                    ['option_text' => 'Carbon dioxide', 'is_correct' => true],
                    ['option_text' => 'Oxygen', 'is_correct' => false],
                    ['option_text' => 'Nitrogen', 'is_correct' => false],
                    ['option_text' => 'Methane', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the square root of 144?',
                'options' => [
                    ['option_text' => '12', 'is_correct' => true],
                    ['option_text' => '10', 'is_correct' => false],
                    ['option_text' => '14', 'is_correct' => false],
                    ['option_text' => '16', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the longest river in the world?',
                'options' => [
                    ['option_text' => 'Nile', 'is_correct' => true],
                    ['option_text' => 'Amazon', 'is_correct' => false],
                    ['option_text' => 'Yangtze', 'is_correct' => false],
                    ['option_text' => 'Mississippi', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who invented the telephone?',
                'options' => [
                    ['option_text' => 'Alexander Graham Bell', 'is_correct' => true],
                    ['option_text' => 'Thomas Edison', 'is_correct' => false],
                    ['option_text' => 'Nikola Tesla', 'is_correct' => false],
                    ['option_text' => 'Guglielmo Marconi', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the smallest prime number?',
                'options' => [
                    ['option_text' => '2', 'is_correct' => true],
                    ['option_text' => '1', 'is_correct' => false],
                    ['option_text' => '3', 'is_correct' => false],
                    ['option_text' => '0', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the capital of Australia?',
                'options' => [
                    ['option_text' => 'Canberra', 'is_correct' => true],
                    ['option_text' => 'Sydney', 'is_correct' => false],
                    ['option_text' => 'Melbourne', 'is_correct' => false],
                    ['option_text' => 'Brisbane', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the largest mammal in the world?',
                'options' => [
                    ['option_text' => 'Blue whale', 'is_correct' => true],
                    ['option_text' => 'Elephant', 'is_correct' => false],
                    ['option_text' => 'Giraffe', 'is_correct' => false],
                    ['option_text' => 'Hippopotamus', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the capital of Brazil?',
                'options' => [
                    ['option_text' => 'Brasília', 'is_correct' => true],
                    ['option_text' => 'Rio de Janeiro', 'is_correct' => false],
                    ['option_text' => 'São Paulo', 'is_correct' => false],
                    ['option_text' => 'Salvador', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the largest desert in the world?',
                'options' => [
                    ['option_text' => 'Antarctica', 'is_correct' => true],
                    ['option_text' => 'Sahara', 'is_correct' => false],
                    ['option_text' => 'Arabian', 'is_correct' => false],
                    ['option_text' => 'Gobi', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the chemical symbol for water?',
                'options' => [
                    ['option_text' => 'H2O', 'is_correct' => true],
                    ['option_text' => 'O2', 'is_correct' => false],
                    ['option_text' => 'CO2', 'is_correct' => false],
                    ['option_text' => 'H2', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who wrote "Romeo and Juliet"?',
                'options' => [
                    ['option_text' => 'William Shakespeare', 'is_correct' => true],
                    ['option_text' => 'Charles Dickens', 'is_correct' => false],
                    ['option_text' => 'Mark Twain', 'is_correct' => false],
                    ['option_text' => 'Jane Austen', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the capital of France?',
                'options' => [
                    ['option_text' => 'Paris', 'is_correct' => true],
                    ['option_text' => 'Berlin', 'is_correct' => false],
                    ['option_text' => 'Madrid', 'is_correct' => false],
                    ['option_text' => 'Rome', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Which planet is known as the Red Planet?',
                'options' => [
                    ['option_text' => 'Mars', 'is_correct' => true],
                    ['option_text' => 'Venus', 'is_correct' => false],
                    ['option_text' => 'Jupiter', 'is_correct' => false],
                    ['option_text' => 'Saturn', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the chemical symbol for water?',
                'options' => [
                    ['option_text' => 'H2O', 'is_correct' => true],
                    ['option_text' => 'O2', 'is_correct' => false],
                    ['option_text' => 'CO2', 'is_correct' => false],
                    ['option_text' => 'H2', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who wrote "Romeo and Juliet"?',
                'options' => [
                    ['option_text' => 'William Shakespeare', 'is_correct' => true],
                    ['option_text' => 'Charles Dickens', 'is_correct' => false],
                    ['option_text' => 'Mark Twain', 'is_correct' => false],
                    ['option_text' => 'Jane Austen', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the largest ocean on Earth?',
                'options' => [
                    ['option_text' => 'Pacific Ocean', 'is_correct' => true],
                    ['option_text' => 'Atlantic Ocean', 'is_correct' => false],
                    ['option_text' => 'Indian Ocean', 'is_correct' => false],
                    ['option_text' => 'Arctic Ocean', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Which element has the chemical symbol "O"?',
                'options' => [
                    ['option_text' => 'Oxygen', 'is_correct' => true],
                    ['option_text' => 'Gold', 'is_correct' => false],
                    ['option_text' => 'Iron', 'is_correct' => false],
                    ['option_text' => 'Silver', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'How many continents are there?',
                'options' => [
                    ['option_text' => '7', 'is_correct' => true],
                    ['option_text' => '5', 'is_correct' => false],
                    ['option_text' => '6', 'is_correct' => false],
                    ['option_text' => '8', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who painted the Mona Lisa?',
                'options' => [
                    ['option_text' => 'Leonardo da Vinci', 'is_correct' => true],
                    ['option_text' => 'Michelangelo', 'is_correct' => false],
                    ['option_text' => 'Vincent van Gogh', 'is_correct' => false],
                    ['option_text' => 'Pablo Picasso', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the square root of 64?',
                'options' => [
                    ['option_text' => '8', 'is_correct' => true],
                    ['option_text' => '6', 'is_correct' => false],
                    ['option_text' => '7', 'is_correct' => false],
                    ['option_text' => '9', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the speed of light?',
                'options' => [
                    ['option_text' => '299,792,458 meters per second', 'is_correct' => true],
                    ['option_text' => '300,000 kilometers per second', 'is_correct' => false],
                    ['option_text' => '150,000 kilometers per second', 'is_correct' => false],
                    ['option_text' => '1,000,000 meters per second', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the largest planet in our solar system?',
                'options' => [
                    ['option_text' => 'Jupiter', 'is_correct' => true],
                    ['option_text' => 'Earth', 'is_correct' => false],
                    ['option_text' => 'Saturn', 'is_correct' => false],
                    ['option_text' => 'Mars', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who is known as the Father of Computers?',
                'options' => [
                    ['option_text' => 'Charles Babbage', 'is_correct' => true],
                    ['option_text' => 'Alan Turing', 'is_correct' => false],
                    ['option_text' => 'John von Neumann', 'is_correct' => false],
                    ['option_text' => 'Steve Jobs', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the hardest natural substance on Earth?',
                'options' => [
                    ['option_text' => 'Diamond', 'is_correct' => true],
                    ['option_text' => 'Gold', 'is_correct' => false],
                    ['option_text' => 'Iron', 'is_correct' => false],
                    ['option_text' => 'Platinum', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the capital city of Australia?',
                'options' => [
                    ['option_text' => 'Canberra', 'is_correct' => true],
                    ['option_text' => 'Sydney', 'is_correct' => false],
                    ['option_text' => 'Melbourne', 'is_correct' => false],
                    ['option_text' => 'Brisbane', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the smallest country in the world?',
                'options' => [
                    ['option_text' => 'Vatican City', 'is_correct' => true],
                    ['option_text' => 'Monaco', 'is_correct' => false],
                    ['option_text' => 'San Marino', 'is_correct' => false],
                    ['option_text' => 'Liechtenstein', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who discovered penicillin?',
                'options' => [
                    ['option_text' => 'Alexander Fleming', 'is_correct' => true],
                    ['option_text' => 'Marie Curie', 'is_correct' => false],
                    ['option_text' => 'Louis Pasteur', 'is_correct' => false],
                    ['option_text' => 'Joseph Lister', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the main ingredient in sushi?',
                'options' => [
                    ['option_text' => 'Rice', 'is_correct' => true],
                    ['option_text' => 'Fish', 'is_correct' => false],
                    ['option_text' => 'Seaweed', 'is_correct' => false],
                    ['option_text' => 'Soy sauce', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Which instrument is used to measure earthquakes?',
                'options' => [
                    ['option_text' => 'Seismograph', 'is_correct' => true],
                    ['option_text' => 'Thermometer', 'is_correct' => false],
                    ['option_text' => 'Barometer', 'is_correct' => false],
                    ['option_text' => 'Hygrometer', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'Who was the first person to step on the moon?',
                'options' => [
                    ['option_text' => 'Neil Armstrong', 'is_correct' => true],
                    ['option_text' => 'Buzz Aldrin', 'is_correct' => false],
                    ['option_text' => 'Yuri Gagarin', 'is_correct' => false],
                    ['option_text' => 'Michael Collins', 'is_correct' => false],
                ],
                'status' => 1,
            ],
            [
                'question_text' => 'What is the currency of Japan?',
                'options' => [
                    ['option_text' => 'Yen', 'is_correct' => true],
                    ['option_text' => 'Won', 'is_correct' => false],
                    ['option_text' => 'Renminbi', 'is_correct' => false],
                    ['option_text' => 'Baht', 'is_correct' => false],
                ],
                'status' => 1,
            ],            
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
