
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




        <BR><BR>
        {{--$user}}
<hr>
        {{$resume--}}
        <div class="row">
            <div class="col-12">

                <div class="card border-primary">
                    <div class="card-header">Your Resumes on File</div>
                    <div class="card-body">


                <table id="resumeDataTable" class="display" style="width:100%;font-size:13px;">
                    <thead>
                    <tr>
                        <th>Resume Name</th>
                        <th>Date Applied</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Populate the table with data from your database -->

                    @foreach ($resume as $resu)
                        <tr>
                            <td>{{ $resu->name }}</td>
                            <td>{{ $resu->created_at->format('Y-m-d') }}</td>
                            <td>{{ $resu->active }}</td>
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
            <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('resumes.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card border-danger">
                        <div class="card-header">Upload New Resume</div>
                        <div class="card-body">
                            <label for="resume"></label>
                            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                            Give it a Name <input type="text" name="name" id="name" required><BR>
                            <input type="file" name="resume" id="resume"><br>
                            <label for="active"></label>
                            <input type="radio" name="active" value="1">Yes Active<BR>
                            <input type="radio" name="active" value="0">No Active<BR>

                            <button type="submit" class="btn btn-warning">Upload</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>

    </x-slot>

    <script>
        $(document).ready(function() {
            $('#resumeDataTable').DataTable();
        });

        // Trigger a success notification
        toastr.success('This is a success message');

        // Trigger an error notification
        toastr.error('This is an error message');

    </script>


    <script>
        // Check if a success message exists in the session
        @if(session('success'))
        // Display the success message using Toastr
        toastr.success("{{ session('success') }}");
        @endif

        // Add similar code for other message types (error, info, warning) if needed
    </script>


</x-app-layout>
