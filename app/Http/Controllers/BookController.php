<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Helper\Template;
use App\Models\Book;

class BookController extends Controller
{
	protected $bookRepository;
	protected $categoryRepository;

	public function __construct(BookRepository $bookRepository, CategoryRepository $categoryRepository)
	{
		$this->bookRepository = $bookRepository;
		$this->categoryRepository = $categoryRepository;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$books = $this->bookRepository->getAll();

		$template = new Template('Book');
		$template->make_bread('Book', '/books')
			->make_field('Title', 'title')
			->make_field('Author', 'author')
			->make_field('Year Published', 'year_published')
			->make_field('Issuer', 'issuer')
			->make_field('Page Number', 'page_number')
			->make_field('Category', 'category_id', [
				'handle' => function ($row)
				{
					return $row->category->name;
				}
			])
	  		->make_field('Created At', 'created_at')
	  		->make_field('Updated At', 'updated_at')
	  		->set_row($books)
	  		->set_route('books');

		return view('books.index', compact('template'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = $this->categoryRepository->getAll();

		$template = new Template('Book');
		$template->make_bread('Book', '/books')
			->make_bread('Create', '/books/create')
			->set_route('books');

		return view('books.create', compact('template', 'categories'));
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
			'title' => 'required|max:255',
			'author' => 'required|max:255',
			'year_published' => 'required|date',
			'issuer' => 'required|max:255',
			'page_number' => 'required|integer',
			'category_id' => 'required|max:255',
		]);

		$this->bookRepository->create($validatedData);

		return redirect()->route('books.index')->with('success', 'Book created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Book  $book
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$book = $this->bookRepository->getById($id);
		return view('books.show', compact('book'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Book  $book
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$categories = $this->categoryRepository->getAll();
		$data = $this->bookRepository->getById($id);

		$template = new Template('Book');
		$template->make_bread('Book', '/books')
			->make_bread('Edit', '/books/edit')
			->set_route('books');

		return view('books.create', compact('data', 'template', 'categories'));
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
		$validatedData = $request->validate([
			'title' => 'required|max:255',
			'author' => 'required|max:255',
			'year_published' => 'required|date',
			'issuer' => 'required|max:255',
			'page_number' => 'required|integer',
			'category_id' => 'required|max:255',
		]);

		$this->bookRepository->updateById($id, $validatedData);

		return redirect()->route('books.index')->with('success', 'Book updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Book  $book
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->bookRepository->deleteById($id);

		return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
	}


	public function search(Request $request)
    {
        $query = $request->input('query');
        $users = Book::where('title', 'like', '%' . $query . '%')->limit(10)->get();

        return response()->json($users);
    }
}
