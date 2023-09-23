
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your DashBoard
        </h2>
        <div class="row">
            <div class="col-12">
                @include('seeker.seekermenu')
            </div>
        </div>



</x-slot>
</x-app-layout>
