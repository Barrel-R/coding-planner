<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return inertia('Tags/Index', [
            'collection' => Tag::all(),
        ]);
    }

    public function show(int $id)
    {
        return inertia('Tags/Show', [
            'record' => Tag::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Tags/Create', [
            //
        ]);
    }

    public function store(TagStoreRequest $request)
    {
        $tag = Tag::create($request->validated());

        return to_route('tags.show', ['tag' => $tag->id]);
    }

    public function edit()
    {
    }

    public function update(TagUpdateRequest $request, int $id)
    {
        Tag::find($id)->update($request->validated());

        return to_route('tags.show', ['tag' => $id]);
    }

    public function destroy(int $id)
    {
        Tag::destroy($id);

        return to_route('tags.index');
    }
}
