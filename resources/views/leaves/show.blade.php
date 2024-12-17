@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Leave Request Details</h2>
    <a href="{{ route('leaves.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <div class="card">
        <div class="card-header">
            <strong>Employee:</strong> {{ $leave->employee->first_name }} {{ $leave->employee->last_name }}
        </div>
        <div class="card-body">
            <p><strong>Start Date:</strong> {{ $leave->start_date }}</p>
            <p><strong>End Date:</strong> {{ $leave->end_date }}</p>
            <p><strong>Reason:</strong> {{ $leave->reason ?? 'N/A' }}</p>
            <p><strong>Status:</strong> {{ $leave->status }}</p>
            <p><strong>Created At:</strong> {{ $leave->created_at->format('d-m-Y H:i:s') }}</p>
            <p><strong>Last Updated:</strong> {{ $leave->updated_at->format('d-m-Y H:i:s') }}</p>
        </div>
    </div>
</div>
@endsection
