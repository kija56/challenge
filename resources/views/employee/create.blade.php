@extends('adminlte.index')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-9 pl-5 content-justify-center">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">New Employee</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/employees" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="firstName" class="col-sm-4 col-form-label">{{ __('First Name') }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('firtsName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required id="firstName" placeholder="First Name">
                                @error('name')
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
                                <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Company</label>
                        <select class="form-control col-sm-8">
                            @foreach($companies as $company)
                          <option name="company" value="{{$company->id}}">{{$company->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
</section>
<!-- /.content -->
@endsection