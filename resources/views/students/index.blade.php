@extends('layout')

@section('content')

<h1>Student List</h1>

<a href="{{ route('students.create') }}">Add Student</a>

@if(session('status'))
    <p>{{ session('status') }}</p>
@endif

@foreach($students as $student)
    <p>
        Roll No: {{ $student->roll_no }} |
        Name: {{ $student->name }} |
        Email: {{ $student->email }}

        <a href="{{ route('students.show', $student->id) }}">
            View
        </a>
    </p>
@endforeach

@endsection
