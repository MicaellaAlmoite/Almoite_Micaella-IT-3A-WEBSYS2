@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Student</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID *</label>
                <input type="text" class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" value="{{ old('student_id', $student->student_id) }}" required>
                @error('student_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Full Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone *</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course *</label>
                <input type="text" class="form-control @error('course') is-invalid @enderror" id="course" name="course" value="{{ old('course', $student->course) }}" required>
                @error('course')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="year_level" class="form-label">Year Level *</label>
                <select class="form-control @error('year_level') is-invalid @enderror" id="year_level" name="year_level" required>
                    <option value="">Select Year</option>
                    <option value="1" {{ old('year_level', $student->year_level) == 1 ? 'selected' : '' }}>1st Year</option>
                    <option value="2" {{ old('year_level', $student->year_level) == 2 ? 'selected' : '' }}>2nd Year</option>
                    <option value="3" {{ old('year_level', $student->year_level) == 3 ? 'selected' : '' }}>3rd Year</option>
                    <option value="4" {{ old('year_level', $student->year_level) == 4 ? 'selected' : '' }}>4th Year</option>
                </select>
                @error('year_level')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address *</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $student->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection