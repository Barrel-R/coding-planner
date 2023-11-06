<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return inertia('Comments/Index', [
            'collection' => Comment::all(),
        ]);
    }

    public function show(int $id)
    {
        return inertia('Comments/Show', [
            'record' => Comment::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Comments/Create', [
            //
        ]);
    }

    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->validated());

        return to_route('comments.show', ['comment' => $comment->id]);
    }

    public function edit()
    {
    }

    public function update(CommentUpdateRequest $request, int $id)
    {
        Comment::find($id)->update($request->validated());

        return to_route('comments.show', ['comment' => $id]);
    }

    public function destroy(int $id)
    {
        Comment::destroy($id);

        return to_route('comments.index');
    }
}
