@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Company
                     <a class="float-right btn btn-primary btn-sm" href="/companies">Go Back</a>
                </div>
                <div class="card-body">
                <form action="/companies" enctype="multipart/form-data" method="post">
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Company Name') }}</label>
                        <input id="name" type="text" 
                        class="form-control col-md-8 @error('name') is-invalid @enderror" name="name" 
                        value="{{ $company->name }}" >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label">{{ __('Company Email') }}</label>
                        <input id="email" type="email" 
                        class="form-control col-md-8 @error('email') is-invalid @enderror" name="email" 
                        value="{{ $company->email }}" >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="website" class="col-md-4 col-form-label">{{ __('Company Website') }}</label>
                        <input id="website" type="text" 
                        class="form-control col-md-8 @error('website') is-invalid @enderror" name="website" 
                        value="{{ $company->website }}" >

                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                    <div class="row pt-3">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form> 
                </div>
            </div>
        </div>
    </div>
@endsection