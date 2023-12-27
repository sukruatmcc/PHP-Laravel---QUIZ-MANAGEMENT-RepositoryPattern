<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IStudentRepositoryInterface
{
    public function getAll();
    public function remove($id);
    public function editRow($id);

    public function updateRow(Request $request,$id);
    public function saveRow(Request $request);
}
