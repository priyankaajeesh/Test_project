@extends('layouts.app')

@section('title', 'Edit Attendance')

@section('content')
<div class="container">
    <h1>Edit Attendance</h1>

    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                <option value="">Select an Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="attendance_date">Date</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" value="{{ old('attendance_date', $attendance->attendance_date) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Attendance</button>
    </form>
</div>
@endsection
