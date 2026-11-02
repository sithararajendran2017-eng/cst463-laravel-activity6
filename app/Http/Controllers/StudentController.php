<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Display student registration form
    public function create()
    {
        return view('students.create');
    }

    // Save a new student
    public function store(Request $request)
    {
       $validated = $request->validate([
    'roll_no' => 'required|unique:students,roll_no',
    'name' => 'required',
    'email' => 'required|email',
    'department' => 'nullable',
    'semester' => 'nullable|integer',
    'cgpa' => 'nullable|numeric'
        ]);

        $student = new Student();
        $student->roll_no = $validated['roll_no'];
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->department = $validated['department'];
        $student->semester = $validated['semester'];
        $student->cgpa = $validated['cgpa'];

        $student->save();

        return redirect()->route('students.index')
            ->with('status', 'Student saved successfully!');
    }

    // Display one student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
