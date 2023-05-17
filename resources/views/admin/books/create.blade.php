@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.books.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        Book Create
                    </span>
                </div>
                <div class="card-body">
                    <x-book.form />
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('admin.books.index') }}">Close</a>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
        </div>
    </form>
@endsection
