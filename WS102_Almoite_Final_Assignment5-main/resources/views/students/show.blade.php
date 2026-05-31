@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="fade-in">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ $student->profile_picture_url }}" 
                         class="rounded-circle mb-3" 
                         style="width: 150px; height: 150px; object-fit: cover; border: 5px solid #667eea;"
                         alt="{{ $student->name }}">
                    <h3>{{ $student->name }}</h3>
                    <p class="text-muted">
                        <i class="fas fa-id-card"></i> {{ $student->student_id }}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        Student Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Student ID:</div>
                        <div class="col-md-8">{{ $student->student_id }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Full Name:</div>
                        <div class="col-md-8">{{ $student->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Email Address:</div>
                        <div class="col-md-8">{{ $student->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Course:</div>
                        <div class="col-md-8">{{ $student->course }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Year Level:</div>
                        <div class="col-md-8">Year {{ $student->year_level }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card text-center">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-qrcode text-primary me-2"></i>
                        Student QR Code
                    </h5>
                </div>
                <div class="card-body">
                    <div class="qr-container p-4 bg-light rounded">
                        {!! $qrCode !!}
                    </div>
                    <p class="mt-3 text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Scan this QR code to view all student information
                    </p>
                    <div class="btn-group" role="group">
                        <a href="{{ route('students.download-qr', $student) }}" class="btn btn-success">
                            <i class="fas fa-download me-2"></i>Download QR
                        </a>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back
                        </a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection