<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Include Toastr CSS -->
        <link rel="stylesheet" href="{{ asset('node_modules/toastr/build/toastr.min.css') }}">
        <!-- Include Toastr JavaScript -->
        <script src="{{ asset('node_modules/toastr/build/toastr.min.js') }}"></script>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

    /* CSS for seeker_menu.blade.php */

    /* Remove default list styles and padding */
    .seekermenu {
        list-style: none;
        padding: 0;
    }

    /* Style for each menu item */
    .seekermenu li {
        display: inline-block;
        margin-right: 10px; /* Adjust spacing between menu items as needed */
        font-size: 13px; /* Change the font size here */
    }

    /* Style for menu item links */
    .seekermenu a {
        text-decoration: none;
        color: #333; /* Adjust link color */
        padding: 5px 10px; /* Adjust padding as needed */
        border: 0px solid #ccc; /* Add a border around each menu item */
        border-radius: 5px; /* Add rounded corners to menu items */
        transition: background-color 0.3s ease; /* Smooth hover effect */
    }

    /* Hover effect */
    .seekermenu a:hover {
        background-color: #f0f0f0; /* Change background color on hover */
    }

.dataTables_wrapper{
    font-size:13px;
}
    select[name="resumeDataTable_length"] {
        /* Add your custom styles here */
        background-color: #fff; /* Change background color */
        color: #333; /* Change text color */
        border: 1px solid #ccc; /* Add a border */
        border-radius: 4px; /* Add rounded corners */
        padding: 5px; /* Adjust padding as needed */
        /* Add more styles as desired */
        background-image: none; /* Remove background image (arrow) */
        cursor: pointer; /* Show pointer cursor to indicate interactivity */
        font-size:13px;
    }
    select[name="applicationDataTable_length"] {
        /* Add your custom styles here */
        background-color: #fff; /* Change background color */
        color: #333; /* Change text color */
        border: 1px solid #ccc; /* Add a border */
        border-radius: 4px; /* Add rounded corners */
        padding: 5px; /* Adjust padding as needed */
        /* Add more styles as desired */
        background-image: none; /* Remove background image (arrow) */
        cursor: pointer; /* Show pointer cursor to indicate interactivity */
        font-size:13px;
    }
    /*
    select[name="resumeDataTable_length"]::-ms-expand,
    select[name="resumeDataTable_length"] {
        -webkit-appearance: none;
        appearance: none;

    }
*/
</style>

         </head>
    <body class="font-sans antialiased">



        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
