@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Student Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Student ID:</th>
                        <td>{{ $student->student_id }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $student->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $student->phone }}</td>
                    </tr>
                    <tr>
                        <th>Course:</th>
                        <td>{{ $student->course }}</td>
                    </tr>
                    <tr>
                        <th>Year Level:</th>
                        <td>{{ $student->year_level }}</td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{{ $student->address }}</td>
                    </tr>
                </table>
                
                <div class="mt-3">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('students.download-qr', $student) }}" class="btn btn-success">Download QR Code</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Student QR Code</h3>
            </div>
            <div class="card-body">
                <div class="qr-code">
                    {!! $qrCode !!}
                </div>
                <div class="mt-3 text-center">
                    <p class="text-muted">Scan this QR code to view all student information</p>
                    <small class="text-info">QR contains: Student ID, Name, Email, Phone, Course, Year Level, Address</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection