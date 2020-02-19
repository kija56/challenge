@extends('adminlte.index')


<!-- Content Wrapper. Contains page content -->

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header pb-4 ">
                    <a class="btn btn-primary btn-sm float-right" href="/employees/create">New Employee</a>
                </div>
                <!-- /.box-header --> 
                <div class="box-body pt-3">
                    @if(count($employees)>0)
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
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->firstName }} {{$employee->lastName}}</td>
                                <td>{{$employee->email}}
                                </td>
                                <td>{{$employee->phone}}</td>
                                <td></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                    @else
                    <p>No any Employee added yet</p>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@endsection