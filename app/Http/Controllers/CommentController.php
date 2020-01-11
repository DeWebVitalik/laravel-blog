<?php

namespace App\Http\Controllers;

use App\CategoryComment;
use App\PostComment;
use App\Http\Requests\CategoryComment as CategoryCommentRequest;
use App\Http\Requests\PostComment as PostCommentRequest;

class CommentController extends Controller
{
    /**
     * Add CategoryComment model
     *
     * @param CategoryCommentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCategoryComment(CategoryCommentRequest $request)
    {
        CategoryComment::create($request->all());
        return response()->json([
            'success' => 'Comment is successfully added',
            'comment' => $request->all(['author', 'content'])
        ]);
    }

    /**
     * Add PostCommentModel
     *
     * @param PostCommentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPostComment(PostCommentRequest $request)
    {
        PostComment::create($request->all());
        return response()->json([
            'success' => 'Comment is successfully added',
            'comment' => $request->all(['author', 'content'])
        ]);
    }
}
