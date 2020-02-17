@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">All Companies
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
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($companies as $company)
                    <tr>
                        <td><a class="" href="/companies/{{$company->id}}">{{$company->name}}</a></td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td class="d-flex"> 
                            <div class="pr-2">
                                <a class="btn btn-primary btn-sm " href="/companies/{{$company->id}}/edit">Edit</a>
                            </div>
                            <form method="POST" action="/companies/{{$company->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $companies->links() !!}
                @else
                <p>No any company added yet</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection