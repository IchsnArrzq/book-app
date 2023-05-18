<?php

namespace App\Http\Controllers\Member;

use App\DataTables\BooksDataTable;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\Loan\LoanCreate;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $loanCreate;
    public function __construct(LoanCreate $loanCreate)
    {
        $this->loanCreate = $loanCreate;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('member.books.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->loanCreate->execute($request->all());
        return redirect()->route('member.loans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $member = auth()->user();
        return view('member.books.show', compact('book', 'member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
