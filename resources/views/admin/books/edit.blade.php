@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.books.update', $book->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        Book Edit
                    </span>
                </div>
                <div class="card-body">
                    <x-book.form :book="$book" />
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('admin.books.index') }}">Close</a>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
        </div>
    </form>
@endsection
