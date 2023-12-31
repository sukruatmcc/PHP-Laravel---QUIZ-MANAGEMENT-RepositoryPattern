<?php


namespace App\Repositories;

use App\Interfaces\IExamRepositoryInterface;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class ExamRepository implements IExamRepositoryInterface
{
    public function getAll()
    {
        return Exam::orderBy('created_at')->get();
    }

    public function remove($id)
    {
        return Exam::find($id)->delete();
    }

    public function saveRow(Request $request)
    {
        Exam::create([
            'name' => $request->name,
            'passing_score' => $request->passing_score,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'updated_at' => $request->updated_at
        ]);
    }

    public function editRow($id)
    {
        return Exam::find($id);
    }

    public function questionRow($id)
    {
        return Exam::where('id',$id)->with('question')->get();
    }

    public function updateRow(Request $request,$id)
    {
        Exam::find($id)->update([
            'name' => $request->name,
            'passing_score' => $request->passing_score,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'updated_at' => $request->updated_at
        ]);
    }

    public function statusRow(Request $request)
    {
        $update = Exam::find($request->id);
        $update->status = $request->status;
        $update->save();
    }
}
