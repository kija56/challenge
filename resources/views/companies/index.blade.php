@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies 
                    <span class="float-right"><a href="/companies/create" class="btn btn-success btn-sm">Add Company</a></span>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Companies</h3>
                    @if(count($companies)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Company</th>
                            <th></th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td><a class="btn btn-primary btn-sm float-right" href="/companies/{{$company->id}}/edit">Edit</a></td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </table>
                   
                    @else
                    <p>No any company added yet</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection