<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IExamRepositoryInterface
{
    public function getAll();
    public function remove($id);
    public function editRow($id);
    public function questionRow($id);
    public function updateRow(Request $request,$id);
    public function saveRow(Request $request);
    public function statusRow(Request $request);
}
