<?php

namespace App\Repositories;

use App\Models\Fine;

class FineRepository
{
    public function getAll()
    {
        return Fine::with('borrowing.user', 'borrowing.book')->get();
    }

    public function create(array $data)
    {
        return Fine::create($data);
    }

    public function getById(int $id)
    {
        return Fine::findOrFail($id);
    }

    public function updateById(int $id, array $data)
    {
        $user = Fine::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteById(int $id)
    {
        $user = Fine::findOrFail($id);
        $user->delete();
    }
}