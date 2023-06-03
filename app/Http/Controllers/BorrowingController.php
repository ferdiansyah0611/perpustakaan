<?php

namespace App\Http\Controllers;

use App\Repositories\BorrowingRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helper\Template;

class BorrowingController extends Controller
{
    protected $borrowingRepository;

    public function __construct(BorrowingRepository $borrowingRepository)
    {
        $this->borrowingRepository = $borrowingRepository;
    }

    public function index()
    {
        $borrowings = $this->borrowingRepository->getAll();

        $template = new Template('Borrowing');
        $template->make_bread('Borrowing', '/borrowings')
            ->make_field('User', 'user_id', [
                'handle' => function ($row) { return $row->user->name;}
            ])
            ->make_field('Book', 'book_id', [
                'handle' => function ($row) { return $row->book->title;}
            ])
            ->make_field('Borrow Date', 'borrow_date')
            ->make_field('Return Date', 'return_date')
            ->make_field('status', 'status')
            ->make_field('Created At', 'created_at')
            ->make_field('Updated At', 'updated_at')
            ->set_row($borrowings)
            ->set_route('borrowings');

        return view('borrowings.index', compact('template'));
    }

    public function create()
    {
        $template = new Template('Borrowing');
        $template->make_bread('Borrowing', '/borrowings')
            ->make_bread('Create', '/borrowings/create')
            ->set_route('borrowings');

        return view('borrowings.create', compact('template'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
            'status' => ['required', Rule::in(['borrowed', 'returned'])],
        ]);

        $borrowing = $this->borrowingRepository->create($validatedData);
        return redirect()->route('borrowings.index')->with('success', 'Borrowing created successfully.');
    }

    public function show($id)
    {
        $borrowing = $this->borrowingRepository->getById($id);
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit($id)
    {
        $data = $this->borrowingRepository->getById($id);

        $template = new Template('Borrowing');
        $template->make_bread('Borrowing', '/borrowings')
            ->make_bread('Edit', '/borrowings/edit')
            ->set_route('borrowings');

        return view('borrowings.create', compact('data', 'template'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
            'status' => ['required', Rule::in(['borrowed', 'returned'])],
        ]);

        $borrowing = $this->borrowingRepository->updateById($id, $validatedData);
        return redirect()->route('borrowings.index', $borrowing->id)->with('success', 'Borrowing updated successfully.');
    }

    public function destroy($id)
    {
        $this->borrowingRepository->deleteById($id);
        return redirect()->route('borrowings.index')->with('success', 'Borrowing deleted successfully.');
    }
}