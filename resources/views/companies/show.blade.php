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
            <div class="box-body">
              @if(count($company->employees)>0)
              <table id="companies" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($company->employees as $employee)
                  <tr>
                    <td>{{$employee->firstName}} {{$employee->lastName}}</td>
                    <td>{{$employee->email}}
                    </td>
                    <td>{{$employee->phone}}</td>
                    <td class="d-flex">
                      <div><a class="btn btn-info btn-sm" href="/employees/{{$employee->id}}"><i class="fa fa-eye"></i> </a></div>
                      <div class="pr-2 pl-2"><a class="btn btn-primary btn-sm" href="/employees/{{$employee->id}}/edit"><i class="fa fa-edit"></i></a></div>
                      <form action="/employees/{{$employee->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
              @else
              <p>No any employee under this company</p>
              @endif
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2 pl-3">
          <h3 class="text-primary">
            <div class="user-block">
              <img class="img-circle img-bordered-sm " src="/storage/{{$company->logo}}" alt="user image">
            </div> {{$company->name}}
          </h3>
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