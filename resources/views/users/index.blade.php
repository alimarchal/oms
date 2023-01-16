@extends('dashboard_layout')
@section('top_title')
    User Management
@endsection
@section('page_main_name')
    Show All Users
@endsection
@section('page_name')
    User Management / Show All User
@endsection
@section('body')
    @csrf
    <br>




    <form method="get" action="{{route('users.index')}}">
        <div class="filters" style="display:none;">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="search">Search</label>
                    <input type="text" class="form-control" id="search" name="filter[search_string]" value="{{ empty(request()->filter['search_string']) ? '' : request()->filter['search_string'] }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select class="form-control select2bs4" id="status" name="filter[status]" style="width:100%">
                        <option value="">None</option>
                        <option value="Active">Active</option>
                        <option value="Deactivate">Deactivate</option>
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="button" class="btn btn-danger hideModule" data-target="filters">Hide Filters
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-3">
                <a href="javascript:;" class="btn btn-primary showModule float-right" data-target="filters">
                    Show Filters</a>
                {{--                <input type="submit" name="search" value="Export" class="btn btn-success float-right mr-2">--}}
            </div>
        </div>
    </form>
    {{--sss | {{ request()->input('filter[search_string]', old('filter[search_string]')) }}--}}


    @if($users->isNotEmpty())
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $customer)
                <tr>
                    <td scope="row"><strong>{{$loop->iteration}}</strong></td>
                    <td>
                        {{$customer->name}}
                    </td>
                    <td>{{$customer->email}}</td>
                    <td>
{{--                        {{ $customer->roles->pluck('name')[0] }}--}}
                    </td>
                    <td class="text-center">
{{--                        <a href="{{route('users.edit', $users->id)}}">--}}
                            <span class="fas fa-edit"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>


        </table>
    @endif
    {{$users->links()}}
@endsection
