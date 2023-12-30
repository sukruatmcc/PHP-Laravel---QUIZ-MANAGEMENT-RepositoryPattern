<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IAnswerRepositoryInterface
{
    public function getAll($id);
    public function examGetAll();
    public function examDetailRow($id);
    public function editRow($id);
    public function questionRow($id);
    public function updateRow(Request $request,$id);
    public function saveRow(Request $request,$id);
    public function statusRow(Request $request);
}
