<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        
        //Get file name with extension
        $fileWithExt = $request->file('logo')->getClientOriginalName();

        //Get file name
        $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);

        //Get file extension
        $extension = $request->file('logo')->getClientOriginalExtension();

        //Create new file name
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Upload file
        $path = $request->file('logo')
        ->storeAs('public', $filenameToStore);

        //Create Company
        $company = new Company();
        $company->name =$request->input('name');
        $company->email =$request->input('email');
        $company->website = $request->input('website');
        $company->logo = $filenameToStore;
        $company->save();

        return redirect('/companies')->with('success','A Company has been succesifully');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
