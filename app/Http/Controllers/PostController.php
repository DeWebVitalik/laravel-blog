<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests\Post as PostRequest;

class PostController extends Controller
{
    /**
     * @param int|null $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('post.index', [
            'posts' => Post::paginate(10)
        ]);
    }

    /**
     * @param int|null $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(int $category)
    {
        $category = Category::findOrFail($category);
        return view('post.index', [
            'category' => $category,
            'posts' => $category->posts()->paginate(10)
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Returns a view with a posting add form.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $categories = Category::all();
        return view('post.add', compact('categories'));
    }

    /**
     * Returns a view with a posting update form.
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(int $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.update', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Deletes the Post model.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(int $id)
    {
        if (Post::findOrFail($id)->delete()) {
            flash('Post successfully deleted!')->success();
        } else {
            flash('Error deleting post!')->error();
        }

        return redirect('posts');
    }

    /**
     * Creates a new Post model or updates the Post model.
     * @param PostRequest $request
     * @param int|null $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(PostRequest $request, int $id = null)
    {
        if ($id) {
            $post = Post::findOrFail($id);
            $redirectUrl = 'post/update/' . $id;
        } else {
            $post = new Post();
            $redirectUrl = 'post/add';
        }

        $post->fill([
            'name' => $request->name,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        //uploads and set file if file exists
        if ($request->hasFile('file')) {
            $filename = $this->uploadFile($request);
            $post->fill(['file' => $filename]);
        }

        if ($post->save()) {
            flash('Post successfully save!')->success();
        } else {
            flash('Error save post!')->error();
        }

        return redirect($redirectUrl);
    }

    /**
     * Downloads the file and returns the filename
     * @param $request
     * @return string
     */
    protected function uploadFile($request)
    {
        $fileName = uniqid() . '.' . $request->file->extension();
        $path = public_path() . '/userfile';
        $file = $request->file('file');
        $file->move($path, $fileName);
        return $fileName;
    }
}
