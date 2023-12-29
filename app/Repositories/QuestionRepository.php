<?php


namespace App\Repositories;

use App\Interfaces\IQuestionRepositoryInterface;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionRepository implements IQuestionRepositoryInterface
{
    public function getAll()
    {
        return Question::whereRole('Student')->orderBy('created_at')->get();
    }

    public function createRow($id)
    {
        return Exam::find($id);
    }

    public function remove($id)
    {
        return Question::find($id)->delete();
    }

    public function saveRow(Request $request)
    {
        Question::create([
            'question' => $request->question,
            'exam_id' => $request->exam_id,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'answer' => $request->answer
        ]);
    }

    public function editRow($id)
    {
        return Question::find($id);
    }

    public function updateRow(Request $request,$id)
    {
        Question::find($id)->update([
            'question' => $request->question,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'answer' => $request->answer
        ]);
    }
}
