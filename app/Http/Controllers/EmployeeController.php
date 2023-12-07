<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    // Function to show employee data
    public function view()
    {
        $employees = Employee::all();
        return view('employee.view', ['employees' => $employees]);
    }

    // function to call form to add new employee data
    public function add()
    {
        return view('employee.add');
    }

    // function to save inputed new employee data to database
    public function save(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|numeric',
            'name' => 'required',
            'position' => 'nullable',
            'department' => 'nullable',
        ]);

        $newEmployee = Employee::create($data);
        return redirect(route('employee.view'));
        // dd($request->employeeDepartment);
    }

    // function to call form to edit data
    public function edit(Employee $employee)
    {
        // dd($employee->nip);
        return view('employee.edit', ['employee' => $employee]);
    }

    // function to update data
    public function update(Employee $employee, Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|numeric',
            'name' => 'required',
            'position' => 'nullable',
            'department' => 'nullable',
        ]);

        $employee->update($data);
        return redirect(route('employee.view'));
    }

    // function to delete data
    public function delete(Employee $employee) 
    {
        $employee->delete();
        return redirect(route('employee.view'));
    }
}
