@extends('adminlte.index')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Employee Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-user mr-1"></i> Name</strong>
                        <p class="text-muted">
                            {{$employee->firstName}} {{$employee->lastName}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-building mr-1"></i> Company</strong>
                        <p class="text-muted">{{$employee->company->name}}</p>
                        <hr>
                        <strong><i class="fas fa-envelope mr-1"></i> Email Address</strong>
                        <p class="text-muted">
                            <span class="tag tag-danger">{{$employee->email}}</span>  
                        </p>
                        <hr>
                        <strong><i class="fas fa-phone mr-1"></i> Phone Number </strong>
                        <p class="text-muted"> {{$employee->phone}} </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>   
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection