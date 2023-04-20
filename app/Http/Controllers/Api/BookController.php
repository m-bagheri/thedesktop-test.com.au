<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::with('author')->get());
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();

        if($request->file()) {
            $file_name = time().'_'.$request->file_url->getClientOriginalName();
            $file_path = $request->file('file_url')->storeAs('uploads', $file_name, 'public');
            $data['file_url'] = $file_path;
        }

        $book = Book::create($data);

        return new BookResource($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();

        if($request->file()) {
            $file_name = time().'_'.$request->file_url->getClientOriginalName();
            $file_path = $request->file('file_url')->storeAs('uploads', $file_name, 'public');
            $data['file_url'] = $file_path;
        }

        $book->update($data);

        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->noContent();
    }
}
