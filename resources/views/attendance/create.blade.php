@extends('layouts.app')

@section('title', 'Mark Attendance')

@section('content')
    <h1>Mark Attendance</h1>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="attendance_date">Date</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
