@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="card-title">
                    Book List
                </span>
            </div>
            <div class="card-body table-responsive">
                {{ $dataTable->table(['class' => 'w-100']) }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
