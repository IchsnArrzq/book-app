<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use App\Services\Book\BookCreate;
use App\Services\Book\BookDelete;
use App\Services\Book\BookUpdate;
use Illuminate\Http\Request;

class ApiBookController extends ApiController
{
    private $bookUpdate;
    private $bookCreate;
    private $bookDelete;
    public function __construct(BookUpdate $bookUpdate, BookCreate $bookCreate, BookDelete $bookDelete)
    {
        $this->bookCreate = $bookCreate;
        $this->bookUpdate = $bookUpdate;
        $this->bookDelete = $bookDelete;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookResource::collection(Book::paginate($this->getLimit()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->bookCreate->execute($request->all());
        return $this->respond([
            'message' => 'success creating book',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->bookUpdate->execute($request->all());
        return $this->respond([
            'message' => 'success updating book',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->bookDelete->execute($book->toArray());
        return $this->respond([
            'message' => 'success deleting book',
        ]);
    }
}
