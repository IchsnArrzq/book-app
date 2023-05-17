@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.members.update', $member->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">
                        Member Edit
                    </span>
                </div>
                <div class="card-body">
                    <x-member.form :member="$member" />
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('admin.members.index') }}">Close</a>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
        </div>
    </form>
@endsection
