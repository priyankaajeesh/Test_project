@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Leave Requests</h2>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">Request Leave</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($leaves as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->employee->first_name }} {{ $leave->employee->last_name }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                 
                    <td>
                        
                        <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No leave requests found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
