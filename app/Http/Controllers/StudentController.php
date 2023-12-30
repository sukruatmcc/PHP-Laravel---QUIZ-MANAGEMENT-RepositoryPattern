<?php

namespace App\Http\Controllers;

use App\Interfaces\IStudentRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    private IStudentRepositoryInterface $adminRepository;

    public function __construct(IStudentRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        $users = $this->adminRepository->getAll();
        return view('admin.students',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->adminRepository->saveRow($request);
        return redirect()->route('dashboard')->with('success','Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function examResults()
    {
        $examResults = $this->adminRepository->examResultRows();
        return view('admin.student-exam-results',compact('examResults'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->adminRepository->editRow($id);
        return view('admin.student-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->adminRepository->updateRow($request,$id);
        return redirect()->route('dashboard')->with('success','Student updated succeefully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->adminRepository->remove($id);
        return response()->json(['success' => true,'status' => 'Success']);
    }

    public function examResultCreate()
    {
        $users = User::whereRole('Student')->get();
        return view('admin.student-exam-result-add',compact('users'));
    }

    public function examResultStore(Request $request)
    {
        $this->adminRepository->examResultStoreRow($request);
        return to_route('examResults')->with('success','Student exam result added successfully');
    }

    public function examResultEdit($id)
    {
        $examResult = $this->adminRepository->examResultEditRow($id);
        $users = User::whereRole('student')->orderBy('created_at')->get();
        return view('admin.student-exam-result-edit',compact('examResult','users'));
    }

    public function examResultUpdate(Request $request,$id)
    {
        $this->adminRepository->examResultUpdateRow($request,$id);
        return to_route('examResults')->with('success','Student exam result updated successfully');
    }

    public function examResultDestroy($id)
    {
        $this->adminRepository->examResultDestroyRow($id);
        return response()->json(['message' => true, 'status' => 'Success']);
    }
}
