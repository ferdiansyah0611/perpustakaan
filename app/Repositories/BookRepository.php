<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function getAll()
    {
        return Book::with('category')->get();
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function getById(int $id)
    {
        return Book::findOrFail($id);
    }

    public function updateById(int $id, array $data)
    {
        $user = Book::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteById(int $id)
    {
        $user = Book::findOrFail($id);
        $user->delete();
    }
}