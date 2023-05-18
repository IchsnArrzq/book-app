<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle"
            src="{{ asset('asset/img/avatar-6.jpg') }}" alt="...">
        <div class="ms-3 title">
            <h1 class="h5 mb-1">{{ auth()->user()->name }}</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">{{ auth()->user()->email }}</p>
        </div>
    </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
    <ul class="list-unstyled">

        {{-- admin --}}
        @if (Route::has('admin.books.index') && Auth::guard('admin')->check())
            <li class="sidebar-item {{ Route::is('admin.books.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.books.index') }}">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                    </svg>
                    <span>{{ __('Books Management') }}</span>
                </a>
            </li>
        @endif
        @if (Route::has('admin.members.index') && Auth::guard('admin')->check())
            <li class="sidebar-item {{ Route::is('admin.members.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.members.index') }}">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#user-1"> </use>
                    </svg>
                    <span>{{ __('Members Management') }}</span>
                </a>
            </li>
        @endif
        @if (Route::has('admin.loans.index') && Auth::guard('admin')->check())
            <li class="sidebar-item {{ Route::is('admin.loans.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.loans.index') }}">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#imac-screen-1"> </use>
                    </svg>
                    <span>{{ __('Loans Management') }}</span>
                </a>
            </li>
        @endif

        {{-- member --}}
        @if (Route::has('member.books.index') && Auth::guard('member')->check())
            <li class="sidebar-item {{ Route::is('member.books.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('member.books.index') }}">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                    </svg>
                    <span>{{ __('Books List') }}</span>
                </a>
            </li>
        @endif
        @if (Route::has('member.loans.index') && Auth::guard('member')->check())
            <li class="sidebar-item {{ Route::is('member.loans.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('member.loans.index') }}">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#imac-screen-1"> </use>
                    </svg>
                    <span>{{ __('Loans List') }}</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
