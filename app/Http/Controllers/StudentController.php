<?php

namespace App\Http\Controllers;

use App\Interfaces\IStudentRepositoryInterface;
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
    public function show(string $id)
    {
        //
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
}
