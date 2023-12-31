<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Interfaces\IAnswerRepositoryInterface;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    private IAnswerRepositoryInterface $answerRepository;

    public function __construct(IAnswerRepositoryInterface $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }
    public function index($id)
    {
        $exam = Exam::find($id);
        $questions = $this->answerRepository->getAll($id);
        return view('student.exam-questions', compact('questions', 'exam'));
    }

    public function exams()
    {
        $exams = $this->answerRepository->examGetAll();

        if (request()->get('name')) {
            $exams = $exams->where('name', request()->get('name'));
        }

        return view('student.exams', compact('exams'));
    }

    public function store(Request $request, $id)
    {
        $this->answerRepository->saveRow($request, $id);
        return to_route('student.exams')->with('success', 'Your exam is over');
    }

    public function examResultDetail($id)
    {
        $exam = Exam::find($id);
        $questions = Exam::with('question.myAnswer')->where('id', $id)->first();
        return view('student.exam-result', compact('questions', 'exam'));
    }

    public function resultAnalysis(Request $request)
    {
        $examId = request()->input('exam_id');
        $passOrfailStatus = request()->input('success_status');

        $query = Result::query();

        if ($examId) {
            $query->where('exam_id', $examId);
        }

        if ($passOrfailStatus == 'pass') {
            $query->where('point', '>=', 50);
        } elseif ($passOrfailStatus == 'fail') {
            $query->where('point', '<', 50);
        }

        $exams = Exam::all();
        $users = User::whereRole('Student')->get();

        return view('student.student-exam-result-filter', compact('exams','users'));
    }
}
