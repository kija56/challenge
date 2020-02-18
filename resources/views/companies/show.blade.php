@extends('adminlte.index')

@section('content')
<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Company Details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1 pr-3">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Employees</span>
                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm " src="/storage/{{$company->logo}}" alt="user image">
                        <span class="username">
                          <a href="#"></a>
                        </span>
                        <span class="description">Added on: {{$company->created_at}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        This is a company based in Dar es Salaam
                      </p>
                    </div>

                    
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2 pl-3">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$company->name}}</h3>
              <p class="text-muted"></p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Company Email
                  <b class="d-block">{{$company->email}}</b>
                </p>
                <p class="text-sm">Company Website
                  <b class="d-block">{{$company->website}}</b>
                </p>
              </div>

              
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add Employee</a>
                <a href="/companies/{{$company->id}}/edit" class="btn btn-sm btn-warning">Edit Details</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
@endsection