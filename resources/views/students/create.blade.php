
@extends('layout')

@section('content')

<h1>Register New Student</h1>

<form action="{{ route('students.store') }}" method="POST">

    @csrf

    <label>Roll Number:</label>
    <input type="text" name="roll_no" required>
    <br><br>

    <label>Name:</label>
    <input type="text" name="name" required>
    <br><br>

    <label>Email:</label>
    <input type="email" name="email" required>
    <br><br>

    <label>Department:</label>
    <input type="text" name="department" required>
    <br><br>

    <label>Semester:</label>
    <input type="number" name="semester" required>
    <br><br>

    <label>CGPA:</label>
    <input type="number" step="0.01" name="cgpa" required>
    <br><br>

    <button type="submit">Save Student</button>

</form>

<br>

<a href="{{ route('students.index') }}">Back to Student List</a>

@endsection
