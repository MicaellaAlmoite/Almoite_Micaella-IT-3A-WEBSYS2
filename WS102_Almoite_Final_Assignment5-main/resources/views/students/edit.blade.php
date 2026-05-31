@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="fade-in">
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">
                <i class="fas fa-edit text-primary me-2"></i>
                Edit Student
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="student_id" class="form-label">Student ID *</label>
                        <input type="text" class="form-control @error('student_id') is-invalid @enderror" 
                               id="student_id" name="student_id" value="{{ old('student_id', $student->student_id) }}" required>
                        @error('student_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Full Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $student->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email', $student->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="course" class="form-label">Course *</label>
                        <select class="form-control @error('course') is-invalid @enderror" 
                                id="course" name="course" required>
                            <option value="">Select Course</option>
                            <option value="Computer Science" {{ old('course', $student->course) == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                            <option value="Information Technology" {{ old('course', $student->course) == 'Information Technology' ? 'selected' : '' }}>Information Technology</option>
                            <option value="Engineering" {{ old('course', $student->course) == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                            <option value="Business Administration" {{ old('course', $student->course) == 'Business Administration' ? 'selected' : '' }}>Business Administration</option>
                            <option value="Psychology" {{ old('course', $student->course) == 'Psychology' ? 'selected' : '' }}>Psychology</option>
                        </select>
                        @error('course')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="year_level" class="form-label">Year Level *</label>
                        <select class="form-control @error('year_level') is-invalid @enderror" 
                                id="year_level" name="year_level" required>
                            <option value="1" {{ old('year_level', $student->year_level) == 1 ? 'selected' : '' }}>1st Year</option>
                            <option value="2" {{ old('year_level', $student->year_level) == 2 ? 'selected' : '' }}>2nd Year</option>
                            <option value="3" {{ old('year_level', $student->year_level) == 3 ? 'selected' : '' }}>3rd Year</option>
                            <option value="4" {{ old('year_level', $student->year_level) == 4 ? 'selected' : '' }}>4th Year</option>
                        </select>
                        @error('year_level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        @if($student->profile_picture)
                            <div class="mb-2">
                                <img src="{{ $student->profile_picture_url }}" width="80" height="80" style="object-fit: cover; border-radius: 50%;">
                                <small class="text-muted d-block mt-1">Current picture</small>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" 
                               id="profile_picture" name="profile_picture" accept="image/*">
                        <small class="text-muted">Leave empty to keep current picture. Max: 2MB</small>
                        @error('profile_picture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Student
                    </button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection