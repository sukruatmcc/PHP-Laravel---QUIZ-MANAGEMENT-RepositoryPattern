<?php


namespace App\Repositories;

use App\Interfaces\IAnswerRepositoryInterface;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerRepository implements IAnswerRepositoryInterface
{
    public function getAll($id)
    {
        return Exam::with('question')->orderBy('created_at')->where('id', $id)->get();
    }

    public function examGetAll()
    {
        return Exam::with('question')->orderBy('end_date')->get();
    }

    public function saveRow(Request $request, $id)
    {
        $questions = Exam::with('question')->orderBy('created_at')->where('id', $id)->first();
        $correct = 0;

        foreach ($questions->question as $question) {
            Answer::create([
                'user_id' => auth()->user()->id,
                'exam_id' => $request->exam_id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id),
            ]);
            if ($question->answer === $request->post($question->id)) { //doğru cevap bulma işlemi.
                $correct += 1;
            }
        }
        $point = round((100 / count($questions->question)) * $correct);
        $wrong = count($questions->question) - $correct;

        Result::create([
            'user_id' => auth()->user()->id,
            'exam_id' => $questions->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong,
        ]);
    }


    public function examDetailRow($id)
    {
        return Exam::with('question')->orderBy('created_at')->where('id',$id)->get();
    }

    public function editRow($id)
    {
        //
    }

    public function questionRow($id)
    {
        //
    }

    public function updateRow(Request $request, $id)
    {
        //
    }

    public function statusRow(Request $request)
    {
        //
    }
}
