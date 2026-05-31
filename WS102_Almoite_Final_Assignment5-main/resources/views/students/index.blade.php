@extends('layouts.app')

@section('title', 'Student List')

@section('content')
<div class="fade-in">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">
                    <i class="fas fa-users text-primary me-2"></i>
                    Student Directory
                </h3>
                <a href="{{ route('students.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>Add New Student
                </a>
            </div>

            <!-- Search and Filter Section -->
            <form method="GET" action="{{ route('students.index') }}" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control search-box" 
                                   placeholder="Search by ID, Name, Email or Course..." 
                                   value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="course" class="form-select search-box">
                            <option value="">All Courses</option>
                            @foreach($courses as $course)
                                <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>
                                    {{ $course }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="year_level" class="form-select search-box">
                            <option value="">All Years</option>
                            @foreach($yearLevels as $year)
                                <option value="{{ $year }}" {{ request('year_level') == $year ? 'selected' : '' }}>
                                    Year {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Search / Filter
                        </button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">
                            <i class="fas fa-sync-alt me-2"></i>Reset
                        </a>
                    </div>
                </div>
            </form>

            <!-- Students Grid -->
            <div class="row">
                @forelse($students as $student)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <img src="{{ $student->profile_picture_url }}" 
                                         class="profile-img" 
                                         style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 3px solid #667eea;"
                                         alt="{{ $student->name }}">
                                    <h5 class="mt-3 mb-1">{{ $student->name }}</h5>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-id-card me-1"></i> {{ $student->student_id }}
                                    </p>
                                </div>
                                
                                <hr>
                                
                                <div class="mb-3">
                                    <p class="mb-2">
                                        <i class="fas fa-envelope text-primary me-2"></i>
                                        <small>{{ $student->email }}</small>
                                    </p>
                                    <p class="mb-2">
                                        <i class="fas fa-graduation-cap text-primary me-2"></i>
                                        <small>{{ $student->course }}</small>
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        <small>Year {{ $student->year_level }}</small>
                                    </p>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-qrcode me-2"></i>View QR Code
                                    </a>
                                    <div class="btn-group">
                                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal{{ $student->id }}">
                                            <i class="fas fa-trash me-1"></i>Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete <strong>{{ $student->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-user-graduate fa-4x text-muted mb-3"></i>
                            <h4>No Students Found</h4>
                            <p class="text-muted">Click the button below to add your first student.</p>
                            <a href="{{ route('students.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Add First Student
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $students->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection