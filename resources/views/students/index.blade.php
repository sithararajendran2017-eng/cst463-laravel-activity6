
@extends('layout')

@section('content')

<h1>Student List</h1>

@if (session('status'))
    <div style="color: green; padding: 10px; margin-bottom: 10px;">
        {{ session('status') }}
    </div>
@endif

<a href="{{ route('students.create') }}">Add Student</a>

@foreach ($students as $student)
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
