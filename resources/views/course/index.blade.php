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

                   @if(auth()->user()->roles->pluck("name")->first() == "Student")
                       <th scope="col">Course Registration</th>
                   @endif

               </tr>
               </thead>
               <tbody>
               @foreach($courses as $customer)
                   <tr>
                       <td scope="row"><strong>{{$loop->iteration}}</strong></td>
                       <td>
                           {{$customer->name}}
                       </td>
                       <td>{{$customer->course_code}}</td>
                       <td>
                           {{ $customer->program }}
                       </td>

                       @if(auth()->user()->roles->pluck("name")->first() == "Student")
                       <td class="text-center">

                           @php $check = \App\Models\CourseRegistration::where('user_id', auth()->id())->where('course_id', $customer->id)->get(); @endphp

                           @if($check->isEmpty())
                               <form action="{{route('courseRegistration.store')}}" method="post">
                                   @csrf
                                   <input type="hidden" name="course_id" value="{{$customer->id}}">
                                   <input type="submit" class="btn btn-primary" value="Register Course">
                               </form>
                               @else
                               <button class="btn btn-success">Already Registered</button>
                           @endif

                       </td>

                           @endif
                   </tr>
               @endforeach
               </tbody>
           </table>
       @endif
   </div>
@endsection
