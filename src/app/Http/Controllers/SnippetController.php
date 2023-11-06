<?php

namespace App\Http\Controllers;

use App\Http\Requests\SnippetStoreRequest;
use App\Http\Requests\SnippetUpdateRequest;
use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{
    public function index()
    {
        return inertia('Snippets/Index', [
            'collection' => Snippet::all(),
        ]);
    }

    public function show(int $id)
    {
        return inertia('Snippets/Show', [
            'record' => Snippet::find($id),
        ]);
    }

    public function create()
    {
        return inertia('Snippets/Create', [
            //
        ]);
    }

    public function store(SnippetStoreRequest $request)
    {
        $snippet = Snippet::create($request->validated());

        return to_route('snippets.show', ['snippet' => $snippet->id]);
    }

    public function edit()
    {
    }

    public function update(SnippetUpdateRequest $request, int $id)
    {
        Snippet::find($id)->update($request->validated());

        return to_route('snippets.show', ['snippet' => $id]);
    }

    public function destroy(int $id)
    {
        Snippet::destroy($id);

        return to_route('snippets.index');
    }
}
