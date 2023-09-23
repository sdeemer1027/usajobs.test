<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
{{--$company--}}

    <div class="container">
        <h1>Edit Company Information</h1>

        <form method="POST" action="{{ route('companies.update', $company->id) }}">
        @csrf
        @method('PUT') <!-- Use the PUT method to update -->

            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
            </div>
            <div class="form-group">
                <label for="phone">Company Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $company->phone }}">
            </div>
            <div class="form-group">
                <label for="address">Company Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}">
            </div>


            <div class="form-group">
                <label for="city">Company city</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $company->city }}">
            </div>
            <div class="form-group">
                <label for="state">Company state</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ $company->state }}">
            </div>
            <div class="form-group">
                <label for="zip">Company Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ $company->zip }}">
            </div>



            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $company->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
