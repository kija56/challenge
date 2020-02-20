@extends('adminlte.index')


<!-- Content Wrapper. Contains page content -->

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Registered Companies</h3>
                </div>
                <!-- /.box-header --> 
                <div class="box-body">
                    @if(count($companies)>0)
                    <table id="companies" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}
                                </td>
                                <td>{{$company->website}}</td>
                                <td class="d-flex">
                                    <div ><a class="btn btn-info btn-sm" href="/companies/{{$company->id}}"><i class="fa fa-eye"></i> </a></div>
                                    <div class="pr-2 pl-2"><a class= "btn btn-primary btn-sm" href="/companies/{{$company->id}}/edit"><i class="fa fa-edit"></i></a></div>
                                    <form action="/companies/{{$company->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class= "btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                    </form>
                                 </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    {!! $companies->links() !!}
                    @else
                    <p>No any company added yet</p>
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