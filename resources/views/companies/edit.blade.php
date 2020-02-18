@extends('adminlte.index')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-9 pl-5 content-justify-center">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">New Company</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/companies/{{$company->id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">{{ __('Company Name') }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->name }}"  required id="name" placeholder="Company Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">{{__('Company Email')}}</label>
                            <div class="col-sm-8">
                                <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $company->email }}"  required placeholder="info@company.co.tz">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-sm-4 col-form-label">{{__('Company Website')}}</label>
                            <div class="col-sm-8">
                                <input id="website" type="text" class="form-control  @error('website') is-invalid @enderror" name="website" value="{{ $company->website  }}" placeholder="https://www.company.co.tz">

                                @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label">{{ __('Company Logo') }}</label>
                            <input type="file" class="form-control-file col-md-8" id="logo" name="logo">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
</section>
<!-- /.content -->
@endsection