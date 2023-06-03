<?php

namespace App\Repositories;

use App\Models\Borrowing;
use Illuminate\Support\Carbon;

class BorrowingRepository
{
    public function getAll()
    {
        return Borrowing::with(['user', 'book'])->get();
    }

    public function create(array $data)
    {
        return Borrowing::create($data);
    }

    public function getById(int $id)
    {
        return Borrowing::with(['user', 'book'])->findOrFail($id);
    }

    public function updateById(int $id, array $data)
    {
        $user = Borrowing::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteById(int $id)
    {
        $user = Borrowing::findOrFail($id);
        $user->delete();
    }

    public function getFines()
    {
        $now = Carbon::now();
        $results = Borrowing::with(['user', 'book'])->where('return_date', '<=', $now)->get();
        $results->map(function($row) use ($now){
            $returnDate = Carbon::parse($row->return_date);
            $daysLate = $now->diffInDays($returnDate);
            $row->daysLate = $daysLate;
            // if ($row->status === 'borrowed') {}
            $row->total_fines = $daysLate * 1000;
        });
        return $results;
    }
}