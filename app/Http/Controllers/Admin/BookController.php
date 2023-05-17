<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BooksDataTable;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\Book\BookCreate;
use App\Services\Book\BookDelete;
use App\Services\Book\BookUpdate;
use App\Traits\JsonRespond;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use JsonRespond;
    private $bookCreate;
    private $bookUpdate;
    private $bookDelete;
    public function __construct(BookCreate $bookCreate, BookUpdate $bookUpdate, BookDelete $bookDelete)
    {
        $this->bookCreate = $bookCreate;
        $this->bookUpdate = $bookUpdate;
        $this->bookDelete = $bookDelete;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('admin.books.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->bookCreate->execute($request->all());
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = collect([...$request->all(), 'id' => $book->id])->toArray();
        $this->bookUpdate->execute($data);
        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->bookDelete->execute(['id' => $book->id]);
        if (request()->ajax()) {
            return $this->respond([
                'message' => 'Successfully removed'
            ]);
        }
        return redirect()->route('admin.books.index');
    }
}
