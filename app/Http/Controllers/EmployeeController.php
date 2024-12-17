<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
{
    return view('employees.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'dob' => 'required|date',
            'department' => 'required',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        // Fetch the employee by ID
        $employee = Employee::findOrFail($id);
    
        // Return the edit view with employee data
        return view('employees.edit', compact('employee'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'position' => 'required|string|max:255',
        ]);
    
        // Fetch and update the employee
        $employee = Employee::findOrFail($id);
        $employee->update($validated);
    
        // Redirect back with a success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }
    public function destroy($id)
{
    // Fetch and delete the employee
    $employee = Employee::findOrFail($id);
    $employee->delete();

    // Redirect back with a success message
    return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
}


}
