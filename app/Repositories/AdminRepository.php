<?php


namespace App\Repositories;

use App\Interfaces\IAdminRepositoryInterface;
use App\Models\User;



class AdminRepository implements IAdminRepositoryInterface
{

    public function getAll()
    {
        return User::orderBy('created_at')->get();
    }

    public function remove($id)
    {
    }

    public function saveRow(Array $request)
    {
    }

    public function find($id)
    {
    }

    public function updateRow($id, Array $request)
    {
    }

}
