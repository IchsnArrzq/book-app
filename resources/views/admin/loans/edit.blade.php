@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.loans.update', $loan->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        Loan Edit
                    </span>
                </div>
                <div class="card-body">
                    <x-loan.form :loan="$loan" />
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('admin.loans.index') }}">Close</a>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
        </div>
    </form>
@endsection
