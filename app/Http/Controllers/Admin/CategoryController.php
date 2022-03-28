<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CategoryCreateRequest;
use App\Http\Requests\Course\CategoryDeleteRequest;
use App\Http\Requests\Course\CategoryUpdateRequest;
use App\Http\Resources\Course\CategoriesCollection;
use App\Http\Resources\Course\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.categories.index');
    }


    public function getPaginatedList()
    {
        try {
            return new CategoriesCollection(
                Category::latest()->paginate(request('items'))
            );
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 503);
        }
    }

    public function getRawList()
    {
        return new CategoriesCollection(Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = $request->save();

        return response()->json([
            'message' => "Successfully created the course category!",
            'category' => new CategoryResource($category),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryUpdateRequest  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $old_slug = $category->slug;
            $category = $request->update($category);

            return response()->json([
                'message' => "Successfully updated the category",
                'redirect_back' => $category->slug != $old_slug,
                'this_page' => route('admin.categories.edit', ['category' => $category->slug]),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDeleteRequest $request, Category $category)
    {
        try {
            $request->delete($category);

            return response()->json([
                'message' => "Successfully deleted the course category!"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
