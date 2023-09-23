
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Details
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
                    <div class="card-header">{{$job->name}}  <span style="float:right">Posted on : {{ $job->created_at->format('Y-m-d') }}</span></div>
                    <div class="card-body">
{{-- {{$job}}<HR>
{{$company}}<HR>--}}
                        Company : {{$company->name}}
                        <br>
                        Salary : {{$job->salarymin}} - {{$job->salarymax}}
                        <br>
                        Type of Work :{{$job->type}}
                        {{$job->conf}}
                        <hr>
                     Details:<BR>    {{$job->description}}
                    </div>


                    <form action="{{ route('apply.job', ['job' => $job->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Apply for Job</button>
                    </form>


                </div>

            </div>
        </div><BR><BR>


    </x-slot>

</x-app-layout>
