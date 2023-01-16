@extends('dashboard_layout')
@section('top_title')
    Course Registration
@endsection
@section('page_main_name')
    Create Course
@endsection
@section('page_name')
    Create Course
@endsection
@section('body')
    @csrf
    <br>

    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row bg-white m-2 p-2">



        @if($courses->isNotEmpty())
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Program</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $customer)
                    <tr>
                        @php $course = \App\Models\Course::find($customer->course_id); @endphp
                        <td scope="row"><strong>{{$loop->iteration}}</strong></td>
                        <td>
                            {{$course->name}}
                        </td>
                        <td>{{$course->course_code}}</td>
                        <td>
                            {{ $course->program }}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
