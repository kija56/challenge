@extends('adminlte.index')

@section('content')
<div class='row'>
    <div class="col-lg-1">
        <p></b></p>
    </div>
    <div class="col-lg-10">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0 text-align-center"><i>{{ trans('sentence.welcome')}}</i> <b>{{ Auth::user()->name }}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title">You have access to the following:</h6>
                <ul>
                    <li class="card-text">Add, view, edit and delete a company</li>
                    <li class="card-text">Add, view, edit, and delete an employee</li>
                    <li class="card-text">Send email to employees</li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- /.row -->
@endsection