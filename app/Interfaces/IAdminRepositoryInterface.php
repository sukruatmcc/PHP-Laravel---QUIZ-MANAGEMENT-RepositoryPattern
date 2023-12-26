<?php

namespace App\Interfaces;

interface IAdminRepositoryInterface
{
    public function getAll();
    public function remove($id);
    public function updateRow($id , Array $request);
    public function saveRow(Array $request);
    public function find($id);
}
