
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
               @foreach($company as $cinfo)
                   {{--$cinfo->name--}}
                    @endforeach
                    {{--$company->name--}}

                   @can('edit_products')

                       @foreach($company as $cinfo)
                           <a href="{{route('companies.edit', $cinfo->id) }}" class="btn btn-primary"> Edit {{$cinfo->name}}   Details</a>
                       @endforeach

                   @endcan
                  @can('create_products')
                      <BR>
                       <a href="{{route('jobs.create') }}" class="btn btn-primary"> Add New Job</a>
                      @endcan



                   {{--$company--}}



                   <HR>
                   <table class="table-auto table table-striped table-dark">
                       <thead>
                       <tr>
                           <td>job</td>
                           <td>type</td>
                           <td>Salary</td>
                           <td>Hourly</td>
                       </tr>
                       </thead>
                       <tbody>
                   @foreach($jobs as $job)
                       <tr>
                           <td>
                           {{$job->name}}
                           </td>
                           <td>
                               {{$job->type}}
                           </td>
                           <td>
                               {{$job->salarymin}} -  {{$job->salarymax}}
                           </td>
                           <td>
                               {{$job->hourlymin}} -  {{$job->hourlymax}}
                           </td>
                       </tr>
                   @endforeach
                       </tbody>
                   </table>


                </div>
{{--$company--}}







            </div>
        </div>
    </div>


    @endrole
</x-app-layout>
