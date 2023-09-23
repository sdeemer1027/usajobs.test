
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Jobs you Applied To
        </h2>
        <div class="row">
            <div class="col-12">
                @include('seeker.seekermenu')
            </div>
        </div>

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
                                <th>Date Applied</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Populate the table with data from your database -->

                            @foreach ($appliedto as $applied)
                                <tr>
                                    <td>{{ $applied->job_id }} - {{ $applied->job_name}}</td>
                                    <td>{{ $applied->name}}</td>
                                    <td>{{ $applied->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $applied->status }}</td>
                                    {{--      <td><a href="{{ route('seeker.resume', ['id' => $application->resume_id]) }}">View Resume</a></td>
                                     --}}
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
