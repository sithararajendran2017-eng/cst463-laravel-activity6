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
        'roll_no' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'department' => 'nullable',
        'semester' => 'nullable|integer',
        'cgpa' => 'nullable|numeric'
    ]);

    $student = Student::updateOrCreate(
        ['roll_no' => $validated['roll_no']],
        [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'department' => $validated['department'] ?? '',
            'semester' => $validated['semester'] ?? 1,
            'cgpa' => $validated['cgpa'] ?? 0
        ]
    );

    return redirect()
        ->route('students.show', $student)
        ->with('status', 'Student added.');
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
