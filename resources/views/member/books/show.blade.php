@extends('layouts.app')

@section('content')
    <form action="{{ route('member.books.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5>Book Detail</h5>
                    <div class="table-responsive">
                        <table class="table mb-0 table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>code</th>
                                    <th>title</th>
                                    <th>publication_year</th>
                                    <th>writer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $book->code }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->publication_year }}</td>
                                    <td>{{ $book->writer }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h5>Loan Form</h5>
                    <x-loan.form :book="$book" :member="$member" />
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('member.books.index') }}">Close</a>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
        </div>
    </form>
@endsection
