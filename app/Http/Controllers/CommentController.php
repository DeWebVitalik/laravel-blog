<?php

namespace App\Http\Controllers;

use App\CategoryComment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentCategory as CommentCategoryRequest;

class CommentController extends Controller
{
    public function addCategoryComment(CommentCategoryRequest $request)
    {
        CategoryComment::create($request->all());
        return response()->json([
            'success' => 'Comment is successfully added',
            'comment' => $request->all(['author', 'content'])
        ]);
    }
}
