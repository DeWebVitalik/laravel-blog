<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Category as CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Lists all Category models.
     * @param int|null $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('category.index', [
            'categories' => Category::paginate(50)
        ]);
    }

    /**
     * @param int|null $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function posts(int $category)
    {
        $category = Category::findOrFail($category);
        return view('category.posts', [
            'category' => $category,
            'posts' => $category->posts()->paginate(10),
        ]);
    }

    /**
     * Returns a view with a category add form.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('category.add');
    }

    /**
     * Returns a view with a category update form.
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(int $id)
    {
        $category = Category::findOrFail($id);
        return view('category.update', compact('category'));
    }

    /**
     * Deletes the Category model.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(int $id)
    {
        try {
            Category::findOrFail($id)->delete();
            flash('Category successfully deleted!')->success();
            return redirect(route('categories'));
        } catch (\Illuminate\Database\QueryException $e) {
            flash('Category is used!')->warning();
            return redirect(route('categoryShow', $id));
        }
    }

    /**
     * Creates a new Category model or updates the Category model.
     * @param PostRequest $request
     * @param int|null $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(CategoryRequest $request, int $id = null)
    {
        $category = new Category();
        $redirectUrl = 'category/add';
        if ($id) {
            $category = Category::findOrFail($id);
            $redirectUrl = 'category/update/' . $id;
        }
        $category->fill([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($category->save()) {
            flash('Category successfully save!')->success();
        } else {
            flash('Error save category!')->error();
        }

        return redirect($redirectUrl);
    }
}
