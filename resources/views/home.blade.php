@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    welcome back {{ auth()->user()->name }}
                </h3>
            </div>
        </div>
    </div>
@endsection
