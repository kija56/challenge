@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="col-md-3 p-3">
            <img class="mr-3 rounded-circle align-self-center img-fluid w-100" src="/storage/{{$company->logo}}" alt="">
        </div>
        <div class="col-md-9 pt-3">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4 pr-2">{{$company->name}}</div>

                </div>
                <div class="pt-4  pr-4">Email: {{$company->email}}</div>
                <div class=""><b>Website:</b> {{$company->website}}</div>
            </div>
            <div class="d-flex">

            </div>
            
        </div>
    </div>
    <div class="row  pt-3">
        
    </div>
</div>
@endsection