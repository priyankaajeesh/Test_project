@extends('layouts.app')

@section('title', 'Leave Request')

@section('content')
    <div class="container">
        <h1>Request Leave</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Leave Request Form -->
        <form action="{{ route('leave.request') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="leave_type">Leave Type</label>
                <input type="text" name="leave_type" id="leave_type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
          
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
@endsection
