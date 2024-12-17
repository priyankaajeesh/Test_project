<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    // Display all leave requests with employee details
    public function index()
    {
        $leaves = Leave::with('employee')->get(); // Get all leave requests with employee data
        return view('leaves.leaveindex', compact('leaves'));
    }

    // Show the form for creating a new leave request
    public function create()
    {
        $employees = Employee::all(); // Fetch all employees

        // If no employees found, show an appropriate message and redirect
        if ($employees->isEmpty()) {
            return redirect()->route('employees.index')->with('error', 'No employees found!');
        }

        return view('leaves.createleave', compact('employees')); // Pass employees to the view
    }

    // Store a new leave request
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'employee_id' => 'required|exists:employees,id', // Ensure employee exists in the database
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date', // End date should be after or equal to start date
            'leave_type' => 'nullable|string', // Optionally allow a leave type
        ]);

        // Create the leave request
        Leave::create([
            'employee_id' => $request->employee_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'leave_type' => $request->leave_type,
            'status' => 'Pending', // Default status is Pending
        ]);

        // Redirect back to the index with a success message
        return redirect()->route('leaves.index')->with('success', 'Leave request created successfully.');
    }

    // Show details of a specific leave request
    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }

    // Show the form for editing a specific leave request
    public function edit(Leave $leave)
{
    // Fetch employees for dropdown
    $employees = Employee::all();

    // Pass leave and employees to the view
    return view('leaves.edit', compact('leave', 'employees'));
}

    // Update the specified leave request
    public function update(Request $request, Leave $leave)
{
    // Validate the incoming data
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'leave_type' => 'nullable|string',
        'status' => 'required|in:Pending,Approved,Rejected',
    ]);

    // Update the leave record
    $leave->update($request->only(['employee_id', 'start_date', 'end_date', 'leave_type', 'status']));

    // Redirect back to the index page with a success message
    return redirect()->route('leaves.index')->with('success', 'Leave updated successfully.');
}

    // Delete a specific leave request
    public function destroy(Leave $leave)
    {
        // Delete the leave request
        $leave->delete();

        // Redirect to the index with a success message
        return redirect()->route('leaves.index')->with('success', 'Leave request deleted successfully.');
    }
}