@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Employee Details</h2>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3">Back to List</a>
    <div class="card">
        <div class="card-header">
            {{ $employee->first_name }}
                {{ $employee->last_name }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p><strong>Date of Birth:</strong> {{ $employee->dob }}</p>
            <p><strong>Department:</strong> {{ $employee->department }}</p>
            <p><strong>Created At:</strong> {{ $employee->created_at->format('d-m-Y H:i:s') }}</p>
        </div>
    </div>
</div>
@endsection