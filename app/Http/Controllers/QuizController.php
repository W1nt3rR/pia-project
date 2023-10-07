<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
        return view('quiz.show', [
            'quiz' => $quiz
        ]);
    }

    public function add(Course $course)
    {
        return view('quiz.create', [
            'course' => $course
        ]);
    }

    public function create(Course $course)
    {
        $quiz = new Quiz();
        $quiz->course_id = $course->id;
        $quiz->save();

        return redirect('/quiz/' . $quiz->id);
    }

    public function remove($quiz)
    {
        $quizObject = Quiz::find($quiz);
        $course = $quizObject->course;
        $quizObject->delete();

        return redirect('/courses/' . $course->id);
    }

    public function addQuestion(Request $request, Quiz $quiz)
    {
        $request->validate([
            'difficulty' => 'required',
            'question' => 'required',
            'correct_answer' => 'required',
            'incorrect_answer_1' => 'required',
            'incorrect_answer_2' => 'required',
            'incorrect_answer_3' => 'required',
        ]);

        $quiz->addQuestion([
            'difficulty' => $request->difficulty,
            'question' => $request->question,
            'correct_answer' => $request->correct_answer,
            'incorrect_answer_1' => $request->incorrect_answer_1,
            'incorrect_answer_2' => $request->incorrect_answer_2,
            'incorrect_answer_3' => $request->incorrect_answer_3,
        ]);

        return redirect('/quiz/' . $quiz->id);
    }

    public function checkAnswers(Request $request)
    {
        $selectedAnswers = $request->input('answers');
        $results = [];
        $questions = [];

        if (!empty($selectedAnswers)) {

            foreach ($selectedAnswers as $questionId => $selectedAnswer) {
                $question = QuizQuestion::find($questionId);
                $question->attempts++;
                auth()->user()->attempts++;

                if ($question->correct_answer === $selectedAnswer) {
                    $results[$questionId] = true;
                    $question->completions++;
                    auth()->user()->completions++;
                } else {
                    $results[$questionId] = false;
                }

                $questions[] = $question;

                auth()->user()->save();
                $question->save();
            }

            $request->session()->put('selectedAnswers', array_keys($selectedAnswers));
            session(['questions' => $questions, 'results' => $results]);
        }

        return redirect('/questions/result');
    }

    public function results()
    {
        $results = session('results');
        $questions = session('questions');

        return view('quiz.result', ['results' => $results, 'questions' => $questions]);
    }

    public function removeQuestion(Quiz $quiz, $questionID)
    {
        $quiz->removeQuestion($questionID);

        return redirect('/quiz/' . $quiz->id);
    }

    public function start(Quiz $quiz, String $difficulty)
    {
        return view('quiz.start', [
            'quiz' => $quiz,
            'difficulty' => $difficulty
        ]);
    }
}
