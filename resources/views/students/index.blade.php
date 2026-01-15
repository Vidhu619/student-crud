@extends('layouts.app')

@section('title','Students')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Students</h4>
@if(auth()->user()->role === 'admin')
        <button class="btn btn-primary" id="addStudentBtn">Add Student</button>
    @endif

</div>

<table class="table table-bordered" id="studentsTable">
    <thead>
        <tr>
            <th>NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

@include('partials.modal')

@endsection
@section('scripts')
<script>
    window.userRole = "{{ auth()->user()->role }}";
</script>


<script src="{{ asset('js/students.js') }}"></script>
@endsection
