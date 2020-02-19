@extends('adminlte.index')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-9 pl-5 content-justify-center">
        <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">New Employee</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/employees" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-4 col-form-label">{{ __('First Name') }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('firtsName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required id="firstName" placeholder="First Name">
                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastName" class="col-sm-4 col-form-label">{{ __('Last Name') }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required id="lastName" placeholder="Last Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">{{__('Email')}}</label>
                            <div class="col-sm-8">
                                <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="user@email.com">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">{{__('Phone Number')}}</label>
                            <div class="col-sm-8">
                                <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Company</label>
                            <select class="form-control col-sm-8" name="company_id">
                                @foreach($companies as $company)
                                <option name="company_id" value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-sm">Submit</button>
                        <a href="/employees" class="btn btn-danger float-right btn-sm">Go Back</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-3 float-right">
            <form action="{{ url('employees/import') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <label for="file">Import a csv file</label>
                <input type="file" name="file" class="form-control"><br>
                <button class="btn btn-success btn-sm">Import File</button>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection