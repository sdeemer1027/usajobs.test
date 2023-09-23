<nav class="navbar">

    <!-- seeker_menu.blade.php -->

    <ul class="seekermenu">
        <li>
            <a href="{{ route('seeker.dashboard') }}">Your Panel</a>
        </li>
        <li>
            <a href="{{ route('seeker.applied') }}">Jobs Applied</a>
        </li>
        <li>
            <a href="{{ route('seeker.findjobs') }}">Find Jobs</a>
        </li>
        <li>
            <a href="{{ route('seeker.resumes') }}">Resumes</a>
        </li>
        <li>
            <a href="{{ route('seeker.resumes') }}">Work History</a>
        </li>
        <li>
            <a href="{{ route('seeker.resumes') }}">Education</a>
        </li>
        <!-- Add more menu items as needed -->
    </ul>

</nav>
