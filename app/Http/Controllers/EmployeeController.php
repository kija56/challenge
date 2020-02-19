<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\AddEmployeeRequest;
use App\Imports\ImportEmployees;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employee.index')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compnies= Company::all();
        return view('employee.create')->with('companies',$compnies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEmployeeRequest $request)
    {
        
        $employee = new Employee();
        $employee->firstName = $request->input('firstName');
        $employee->lastName = $request->input('lastName');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->company_id = $request->input('company_id');
        $employee->save();
       return redirect('/employees')->with('success','Employee has been added succesfully');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'file' =>'required'
        ]);
        try{
            Excel::import(new ImportEmployees, request()->file('file'));
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            
            foreach ($failures as $failure) {
                $failure->row(); 
                $failure->attribute(); 
                $failure->errors(); 
                $failure->values(); 
            }
        }  
        return redirect('/employees');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrfail($id);
        return view('employee.edit')->with('employee',$employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddEmployeeRequest $request, $id)
    {
        $employee = Employee::findOrfail($id);
        $employee->firstName = $request->input('firstName');
        $employee->lastName = $request->input('lastName');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->company_id = $request->input('company_id');
        $employee->update();
       return redirect('/employees')->with('success','Employee details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
