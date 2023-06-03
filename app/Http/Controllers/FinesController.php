<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FineRepository;
use App\Repositories\BorrowingRepository;
use App\Models\Fine;
use App\Models\Borrowing;
use App\Helper\Template;

class FinesController extends Controller
{

	protected $fineRepository;
	protected $borrowingRepository;

	public function __construct(FineRepository $fineRepository, BorrowingRepository $borrowingRepository)
	{
		$this->fineRepository = $fineRepository;
		$this->borrowingRepository = $borrowingRepository;
	}

	public function violation()
	{
		$fines = $this->borrowingRepository->getFines();

		$template = new Template('Violation Borrowing');
		$template->make_bread('Violation', '/violation')
			->make_field('User', 'user_id', [
				'handle' => function ($row) { return $row->user->name;}
			])
			->make_field('Book', 'book_id', [
				'handle' => function ($row) { return $row->book->title;}
			])
			->make_field('Borrow Date', 'borrow_date')
			->make_field('Return Date', 'return_date')
			->make_field('status', 'status')
			->make_field('Days Late', 'daysLate', [
				'handle' => function ($row) {
					$str = "";
					if ($row->status === 'borrowed') {
						$str .= '<span class="badge bg-danger">';
					} else {
						$str .= '<span class="badge bg-primary">';
					} 

					$str .= $row->daysLate . ' Days</span>';
					return $str;
				},
				'disable_xss' => true
			])
			->make_field('Total Fines', 'total_fines', [
				'handle' => fn ($row) => convert_currency($row, 'total_fines')
			])
			->make_field('Created At', 'created_at')
			->make_field('Updated At', 'updated_at')
			->set_option('is_fines_index', true)
			->set_row($fines)
			->set_route('borrowings');

		return view('fines.index', compact('template'));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$fines = $this->fineRepository->getAll();

		$template = new Template('Fines Paid');
        $template->make_bread('Fines', '/fines')
            ->make_field('User', 'user_id', [
                'handle' => function ($row) { return $row->borrowing->user->name;}
            ])
            ->make_field('Book', 'book_id', [
                'handle' => function ($row) { return $row->borrowing->book->title;}
            ])
            ->make_field('Amount Paid', 'amount', [
            	'handle' => fn ($row) => convert_currency($row, 'amount')
            ])
            ->make_field('Created At', 'created_at')
            ->make_field('Updated At', 'updated_at')
            ->set_option('disable_edit', true)
            ->set_row($fines)
            ->set_route('borrowings');

		return view('fines.index', compact('fines', 'template'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return redirect()->back();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'borrowing_id' => 'required|exists:borrowing,id',
			'amount' => 'required|integer|min:0'
		]);

		$fine = $this->fineRepository->create($validatedData);
		$this->borrowingRepository->updateById($validatedData['borrowing_id'], [
			'status' => 'returned',
		]);
		return redirect()->back()->with('success', 'Fines created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Book  $book
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$fine = $this->fineRepository->getById($id);
		return view('fines.show', compact('fine'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Book  $book
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$fine = $this->fineRepository->getById($id);
		return view('fines.edit', compact('fine'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Book  $book
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Book  $book
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->fineRepository->deleteById($id);
		return redirect()->route('fines.index')->with('success', 'Fines deleted successfully.');
	}
}


function convert_currency($row, $key) {
	return 'Rp ' . number_format($row->{$key}, 0, ',', '.');
}