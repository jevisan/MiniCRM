<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Employees';
        $employees = Employee::all();
        $data = [
            'title' => $title,
            'employees' => $employees
        ];

        return view('employees.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New Employee';
        $data = [
            'title' => $title
        ];
        return view('employees.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name'    => ['required', 'string'],
            'last_name'     => ['required', 'string'],
            'email'         => ['nullable', 'email'],
            'phone'         => ['nullable', 'digits_between:10,12'],
            'company'       => ['required']
        ]);

        if ($attributes['company'] != 0) {
            $attributes['company_id'] = $attributes['company'];
        } else {
            $attributes['company_id'] = null;
        }

        $employee = Employee::create($attributes);

        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $title = $employee->first_name.' '.$employee->last_name.' detail';

        $data = [
            'title' => $title,
            'employee' => $employee
        ];

        return view('employees.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $title = 'Edit '.$employee->first_name.' '.$employee->last_name;
        $data = [
            'title'     => $title,
            'employee'   => $employee
        ];
        return view('employees.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $attributes = $request->validate([
            'first_name'    => ['required', 'string'],
            'last_name'     => ['required', 'string'],
            'email'         => ['nullable', 'email'],
            'phone'         => ['nullable', 'digits_between:10,12'],
            'company'       => ['required']
        ]);

        if ($attributes['company'] != 0) {
            $attributes['company_id'] = $attributes['company'];
        } else {
            $attributes['company_id'] = null;
        }

        $employee->update($attributes);

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('employees');
    }
}
