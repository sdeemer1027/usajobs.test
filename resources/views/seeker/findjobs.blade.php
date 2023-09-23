
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Find Jobs
        </h2>
        <div class="row">
            <div class="col-12">
                @include('seeker.seekermenu')
            </div>
        </div>
{{--$availjobs--}}
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-header">Jobs</div>
                    <div class="card-body">
                        <table id="applicationDataTable" class="display" style="width:100%;font-size:13px;">
                            <thead>
                            <tr>
                                <th>Job Name</th>
                                <th>Company Name</th>
                                <th>Date Added</th>
                                <th>Status</th>
                                <th>type</th>
                                <th>Salary</th>
                                <th>Contract</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Populate the table with data from your database -->

                            @foreach ($availjobs as $availjob)
                                <tr>
                                    <td>{{ $availjob->name }} </td>
                                    <td>{{ $availjob->company_name}}</td>
                                    <td>{{ $availjob->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $availjob->status }}</td>
                                    <td>{{ $availjob->type }}</td>
                                     <td>{{ $availjob->salarymin }}</td>
                                      <td>{{ $availjob->conf }}</td>
                                    <td><a href="{{ route('job.details', ['id' => $availjob->id]) }}">View Details</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><BR><BR>


    </x-slot>
    <script>
        $(document).ready(function() {
            $('#applicationDataTable').DataTable();
        });

    </script>
</x-app-layout>
