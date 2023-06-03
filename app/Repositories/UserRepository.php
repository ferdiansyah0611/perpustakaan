<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function getById(int $id)
    {
        return User::findOrFail($id);
    }

    public function updateById(int $id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteById(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}