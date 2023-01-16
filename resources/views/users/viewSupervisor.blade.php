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



       @if(!empty($supervisor))
           <table class="table table-bordered text-center">
               <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Supervisor Name</th>
                   <th scope="col">Mobile</th>
                   <th scope="col">Email</th>
               </tr>
               </thead>
               <tbody>
                   <tr>
                       <td scope="row"><strong>1</strong></td>
                       <td>
                           {{$supervisor->name}}
                       </td>
                       <td>{{$supervisor->mobile}}</td>
                       <td>
                           {{ $supervisor->email }}
                       </td>
                   </tr>
               </tbody>
           </table>
       @endif
   </div>
@endsection
