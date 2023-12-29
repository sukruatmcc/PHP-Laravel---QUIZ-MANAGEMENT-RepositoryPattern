<?php

namespace App\Http\Controllers;

use App\Interfaces\IQuestionRepositoryInterface;
use App\Models\Exam;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private IQuestionRepositoryInterface $questionRepository;

    public function __construct(IQuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $exam =  $this->questionRepository->createRow($id);
        return view('admin.question-add',compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->questionRepository->saveRow($request);
        return redirect()->route('exam.questions',$request->exam_id)->with('success','Question added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = $this->questionRepository->editRow($id);
        return view('admin.question-edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->questionRepository->updateRow($request,$id);
        return back()->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->questionRepository->remove($id);
        return response()->json(['success' => true, 'status' => 'Success']);
    }
}
