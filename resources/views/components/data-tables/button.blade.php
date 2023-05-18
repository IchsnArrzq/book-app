@auth('admin')
    @switch(request()->path())
        @case('admin/books')
            <a href="{{ route('admin.books.edit', $id) }}" class="btn btn-info">
                edit
            </a>
            <button class="btn btn-danger" onclick="callbackDelete(this)" data-id="{{ $id }}">
                delete
            </button>
        @break

        @case('admin/members')
            <a href="{{ route('admin.members.edit', $id) }}" class="btn btn-info">
                edit
            </a>
            <button class="btn btn-danger" onclick="callbackDelete(this)" data-id="{{ $id }}">
                delete
            </button>
        @break

        @case('admin/loans')
            <button class="btn btn-info" onclick="callbackStatus(this)" data-id="{{ $id }}">
                Status
            </button>
        @break
    @endswitch
@endauth
@auth('member')
    @switch(request()->path())
        @case('member/books')
            <a href="{{ route('member.books.show', $id) }}" class="btn btn-info">
                loan
            </a>
        @break
    @endswitch
@endauth
