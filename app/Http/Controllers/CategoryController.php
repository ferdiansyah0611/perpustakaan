<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Helper\Template;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();

        $template = new Template('Category');
        $template->make_bread('Category', '/categories')
            ->make_field('Name', 'name')
            ->make_field('Created At', 'created_at')
            ->make_field('Updated At', 'updated_at')
            ->set_row($categories)
            ->set_route('categories');

        return view('categories.index', compact('template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template = new Template('Category');
        $template->make_bread('Category', '/categories')
            ->make_bread('Create', '/categories/create')
            ->set_route('categories');

        return view('categories.create', compact('template'));
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
            'name' => 'required|unique:categories,name|max:255',
        ]);

        $this->categoryRepository->create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->categoryRepository->getById($id);
        $template = new Template('Dashboard');
        $template->make_bread('Category', '/categories')
            ->make_bread('Edit', '/categories/edit')
            ->set_route('categories');

        return view('categories.create', compact('template', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);

        $this->categoryRepository->updateById($id, $validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->deleteById($id);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}