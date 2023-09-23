
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @role('Company')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


    <h1>Create a New Job</h1>

    <form method="POST" action="{{ route('jobs.store') }}">
    @csrf
{{--$user}}
        {{$company--}}

    <!-- Job creation form fields go here -->
        <input type="hidden" class="form-control" id="company_id" name="company_id" value="{{$company->id}}">
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user->id}}">

        <div class="form-group">
            <label for="name">Job Title</label>
            <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control" id="description" name="description" value="">
        </div>
        <div class="form-group">
            <label for="type">type</label>
            <select class="form-control" id="type" name="type">
                <option value="onsite">OnSite</option>
                <option value="hybrid">Hybrid</option>
                <option value="remote">Remote</option>
            </select>







        </div>
        <div class="form-group">
            <label for="type">Contract/FullTime/PartTime</label>
            <select class="form-control" id="corf" name="corf">
                <option value="Contract">Contract</option>
                <option value="FullTime">FullTime</option>
                <option value="PartTime">PartTime</option>
            </select>




        <div class="form-group">
            <label for="salary">Salary per year we automatically will transform it to an hourly rate</label>
            Min: <input type="number" class="form-control" id="salarymin" name="salarymin" value="">
            Max: <input type="number" class="form-control" id="salarymax" name="salarymax" value="">
        </div>
        <button type="submit" class="btn btn-primary">Create Job</button>
    </form>








                </div>
            </div>
        </div>


        @endrole
</x-app-layout>
