<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('course', 'like', "%{$search}%");
            });
        }

        // Filter by course
        if ($request->has('course') && $request->course != '') {
            $query->where('course', $request->course);
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Get unique courses for filter dropdown
        $courses = Student::distinct()->pluck('course');
        
        return view('students.index', compact('students', 'courses'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students',
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer',
            'address' => 'required'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        // Generate QR Code with all student data
        $studentData = [
            'Student ID' => $student->student_id,
            'Name' => $student->name,
            'Email' => $student->email,
            'Phone' => $student->phone,
            'Course' => $student->course,
            'Year Level' => $student->year_level,
            'Address' => $student->address
        ];
        
        $qrCode = QrCode::size(200)->generate(json_encode($studentData));
        
        return view('students.show', compact('student', 'qrCode'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer',
            'address' => 'required'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }

    public function downloadQr(Student $student)
    {
        $studentData = [
            'Student ID' => $student->student_id,
            'Name' => $student->name,
            'Email' => $student->email,
            'Phone' => $student->phone,
            'Course' => $student->course,
            'Year Level' => $student->year_level,
            'Address' => $student->address
        ];
        
        $qrCode = QrCode::size(300)->generate(json_encode($studentData));
        
        return response($qrCode)->header('Content-Type', 'image/svg+xml')
            ->header('Content-Disposition', 'attachment; filename="student-'.$student->student_id.'.svg"');
    }
}