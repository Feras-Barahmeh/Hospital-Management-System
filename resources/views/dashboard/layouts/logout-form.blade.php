
@if(auth('web')->check())
    <form method="POST" action="{{ route('user.logout') }}">
        @csrf
        <a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
            <i class="bx bx-log-out"></i> Sign Out
        </a>
    </form>

@elseif(auth('admin')->check())

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
            <i class="bx bx-log-out"></i> Sign Out
        </a>
    </form>

@endif

