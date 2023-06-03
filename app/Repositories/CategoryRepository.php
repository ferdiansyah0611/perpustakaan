<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAll()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function getById(int $id)
    {
        return Category::findOrFail($id);
    }

    public function updateById(int $id, array $data)
    {
        $user = Category::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteById(int $id)
    {
        $user = Category::findOrFail($id);
        $user->delete();
    }
}