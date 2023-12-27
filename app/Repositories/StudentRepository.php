<?php


namespace App\Repositories;

use App\Interfaces\IStudentRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class StudentRepository implements IStudentRepositoryInterface
{
    public function getAll()
    {
        return User::whereRole('Student')->orderBy('created_at')->get();
    }

    public function remove($id)
    {
        return User::find($id)->delete();
    }

    public function saveRow(Request $request)
    {
        User::create([
            'name' => $request->name,
            'role' => 'Student',
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    public function editRow($id)
    {
        return User::find($id);
    }

    public function updateRow(Request $request,$id)
    {
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }
}
