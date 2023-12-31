<?php

namespace App\Http\Controllers;

use App\Interfaces\IExamRepositoryInterface;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    private IExamRepositoryInterface $examRepository;

    public function __construct(IExamRepositoryInterface $examRepository)
    {
        $this->examRepository = $examRepository;
    }
    public function index()
    {
        $exams = $this->examRepository->getAll();
        return view('admin.exams', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exam-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->examRepository->saveRow($request);
        return redirect()->route('exams')->with('success', 'Exam added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function status(Request $request)
    {
        $this->examRepository->statusRow($request);
        return response()->json(['message' => "Status Updated", "status" => "Success"]);
    }

    public function show($id)
    {
        $questions = $this->examRepository->questionRow($id);
        return view('admin.questions', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam = $this->examRepository->editRow($id);
        return view('admin.exam-edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->examRepository->updateRow($request, $id);
        return to_route('exams')->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->examRepository->remove($id);
        return response()->json(['success' => true, 'status' => 'Success']);
    }

    public function assignQuestions()
    {
        $questions = Question::all();
        $students = User::whereRole('Student')->get();

        $assignmentList = [];

        foreach ($students as $student) {
            $assignedQuestions = $questions->random(ceil(count($questions) * 0.2));

            $assignmentList[$student->name] = $assignedQuestions->pluck('question')->toArray();
        }

        return view('admin.question-assignment', compact('assignmentList'));
    }
}
