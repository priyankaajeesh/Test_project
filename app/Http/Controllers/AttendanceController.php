<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Display all attendance records
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendance.index', compact('attendances'));
    }

    // Show the form for marking attendance
    public function create()
    {
        $employees = Employee::all(); // Fetch all employees
        //dd($employees); // Dump and die to check the data
        return view('attendance.create', compact('employees'));
    }

    // Store a new attendance record
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        Attendance::create([
            'employee_id' => $request->employee_id,
            'attendance_date' => $request->attendance_date,
            'status' => $request->status,
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance marked successfully!');
    }

    // Show the form for editing attendance
    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    // Update an attendance record
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        $attendance->update([
            'employee_id' => $request->employee_id,
            'attendance_date' => $request->attendance_date,
            'status' => $request->status,
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully!');
    }

    // Delete an attendance record
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Attendance record deleted successfully!');
    }
}