@extends('adminlte.index')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Compose New Message</h3>
                </div>
                <!-- /.box-header -->
                <form action="/employees/sendMail" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="To:All Employees">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subject" placeholder="Subject:" required>
                        </div>
                        <div class="form-group">
                            <textarea id="compose-textarea" name="message" class="form-control" style="height: 100px" required>
                            </textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </form>

            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection