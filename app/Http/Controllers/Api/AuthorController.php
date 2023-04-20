<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    public function store(AuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return new AuthorResource($author);
    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return new AuthorResource($author);
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return response()->noContent();
    }
}
