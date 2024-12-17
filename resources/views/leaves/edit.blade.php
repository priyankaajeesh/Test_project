@extends('layouts.app')

@section('content')
    <h2>Edit Leave Request</h2>

    <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="employee_id">Employee</label>
    <select name="employee_id" id="employee_id" required>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}" {{ $leave->employee_id == $employee->id ? 'selected' : '' }}>
                {{ $employee->first_name }} {{ $employee->last_name }}
            </option>
        @endforeach
    </select>

    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" value="{{ $leave->start_date }}" required>

    <label for="end_date">End Date</label>
    <input type="date" name="end_date" value="{{ $leave->end_date }}" required>

    <label for="leave_type">Leave Type</label>
    <input type="text" name="leave_type" value="{{ $leave->leave_type }}">

    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="Pending" {{ $leave->status == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Approved" {{ $leave->status == 'Approved' ? 'selected' : '' }}>Approved</option>
        <option value="Rejected" {{ $leave->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
    </select>

    <button type="submit">Update</button>
</form>
@endsection
