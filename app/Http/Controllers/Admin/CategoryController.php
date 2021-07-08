<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
	/**
	 * @var Category
	 */
	private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $categories = $this->category->paginate(10);

	    return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.categories.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CategoryRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function store(CategoryRequest $request)
    {
	    $data = $request->all();

	    $category = Category::create($data);

	    flash('Categoria Criado com Sucesso!')->success();
	    return redirect()->route('admin.categories.index');
    }

    public function edit($category)
    {
	    $category = Category::findOrFail($category);

	    return view('admin.categories.edit', compact('category'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param CategoryRequest $request
	 * @param  int $category
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function update(CategoryRequest $request, $category)
    {
	    $data = $request->all();

	    $category = Category::find($category);
	    $category->update($data);

	    flash('Categoria Atualizada com Sucesso!')->success();
	    return redirect()->route('admin.categories.index');
    }


    public function destroy($category)
    {
	    $category = Category::find($category);
	    $category->delete();

	    flash('Categoria Removida com Sucesso!')->success();
	    return redirect()->route('admin.categories.index');
        
    }
}