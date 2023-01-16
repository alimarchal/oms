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
    <form class="row p-2 m-2 bg-white rounded" method="post" action="{{route('course.store')}}">
        @csrf
        <br>
        <div class="col-md-4 mb-2">
            <label for="name"><strong>Course Name</strong></label>
            <input type="text" id="name" class="form-control" name="name" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="course_code"><strong>Course Code</strong></label>
            <input type="text" class="form-control" id="course_code" required name="course_code">
        </div>

        <div class="col-md-4 mb-2">
            <label for="program"><strong>Program</strong></label>
            <select class="form-control select2bs4" required id="program" style="width: 100%;" name="program">
                <option value="">None</option>
                <option value="BS (SE)">BS (SE)</option>
                <option value="BS (CS)">BS (CS)</option>
                <option value="BS (AI)">BS (AI)</option>
                <option value="MS (SE)">MS (SE)</option>
                <option value="MS (IS)">MS (IS)</option>
                <option value="MS (CS)">MS (CS)</option>
                <option value="PHD (CS)">PHD (CS)</option>
            </select>
        </div>
        <button class="btn btn-danger" type="submit">Submit</button>
    </form>
@endsection

