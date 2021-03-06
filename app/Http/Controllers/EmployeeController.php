<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\AddEmployeeRequest;
use App\Imports\ImportEmployees;
use App\Mail\SendToEmployees;
use App\Notifications\EmployeeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compnies = Company::all();
        return view('employee.create')->with('companies', $compnies);
    }

    public function email()
    {
        $employees = Employee::all();
        return view('employee.message')->with('employees', $employees);
    }

    public function sendMail(Request $request)
    {

        $user = Auth::user();
        $employees = Employee::all();
        $message = new \stdClass();
        foreach ($employees as $employee) {
            $message->senderEmail = $user->email;
            $message->senderName = $user->name;
            $message->message = $request->message;
            $message->subject = $request->subject;
            $message->email = $employee->email;
            Mail::queue(new SendToEmployees($message));
        }



        // $employees = Employee::all();
        // foreach ($employees as $employee) {
        //     $employee->notify(new EmployeeNotification());
        // }
        return redirect('/home');
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
        return redirect('/employees')->with('success', 'Employee has been added succesfully');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        try {
            Excel::import(new ImportEmployees, request()->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            foreach ($failures as $failure) {
                $failure->row();
                $failure->attribute();
                $failure->errors();
                $failure->values();
            }
           return back()->withErrors($failures);
        }
        return redirect('/employees')->with('success','Employees added successfully');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrfail($id);
        return view('employee.show')->with('employee', $employee);
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
        return view('employee.edit')->with('employee', $employee);
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
        return redirect('/employees')->with('success', 'Employee details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrfail($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee deleted successfully');
    }
}
