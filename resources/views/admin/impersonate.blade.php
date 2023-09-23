<!-- resources/views/admin/impersonate.blade.php -->

@if (auth()->user() && auth()->user()->hasRole('Admin'))

    @foreach ($usersToImpersonate as $userToImpersonate)
        @if (!session()->has('admin_id'))
            <form action="{{ route('start.impersonate', $userToImpersonate) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Impersonate {{ $userToImpersonate->name }}</button>
            </form>
        @else
            <form action="{{ route('stop.impersonate') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Stop Impersonation</button>
            </form>
        @endif
    @endforeach

@endif
