<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('course', 'like', "%{$search}%");
            });
        }

        // Filter by course
        if ($request->filled('course')) {
            $query->where('course', $request->course);
        }

        // Filter by year level
        if ($request->filled('year_level')) {
            $query->where('year_level', $request->year_level);
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(12);
        
        // Get unique courses for filter
        $courses = Student::distinct()->pluck('course');
        $yearLevels = [1, 2, 3, 4];
        
        return view('students.index', compact('students', 'courses', 'yearLevels'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'course' => 'required|string|max:100',
            'year_level' => 'required|integer|between:1,4',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $student = new Student($request->except('profile_picture'));

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('student-photos', $filename, 'public');
            $student->profile_picture = $path;
        }

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        // Generate QR code with student data
        $studentData = [
            'Student ID' => $student->student_id,
            'Name' => $student->name,
            'Email' => $student->email,
            'Course' => $student->course,
            'Year Level' => $student->year_level
        ];
        
        $qrCode = QrCode::size(250)
            ->color(13, 138, 188)
            ->backgroundColor(255, 255, 255)
            ->generate(json_encode($studentData));
        
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course' => 'required|string|max:100',
            'year_level' => 'required|integer|between:1,4',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $student->fill($request->except('profile_picture'));

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old picture if exists
            if ($student->profile_picture && Storage::disk('public')->exists($student->profile_picture)) {
                Storage::disk('public')->delete($student->profile_picture);
            }
            
            $image = $request->file('profile_picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('student-photos', $filename, 'public');
            $student->profile_picture = $path;
        }

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        // Delete profile picture if exists
        if ($student->profile_picture && Storage::disk('public')->exists($student->profile_picture)) {
            Storage::disk('public')->delete($student->profile_picture);
        }
        
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }

    public function downloadQr(Student $student)
    {
        $studentData = [
            'Student ID' => $student->student_id,
            'Name' => $student->name,
            'Email' => $student->email,
            'Course' => $student->course,
            'Year Level' => $student->year_level
        ];
        
        $qrCode = QrCode::size(300)
            ->color(13, 138, 188)
            ->backgroundColor(255, 255, 255)
            ->generate(json_encode($studentData));
        
        return response($qrCode)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Content-Disposition', 'attachment; filename="student-'.$student->student_id.'.svg"');
    }
}