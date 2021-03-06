@extends('admin.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Add | Edit | Delete | Manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::to('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

              <h3 class="box-title"><a href="{{ URL::to('admin/addeditadmin')}}" class="btn btn-block btn-primary" >Add Admin</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Active</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                
                @foreach(\App\Users::where('user_delete',FALSE)->where('user_accesslevel','1')->get() as $i => $vendor)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td><img src="{{ \App\Users::profile_image($vendor->user_profile_image) }}" height="30px" width="30px" /></td>
                  <td>{{ $vendor->user_fname }} {{ $vendor->user_lname }}
                  </td>
                  <td>{{ $vendor->user_email }}</td>
                  <td>
                  <a href="{{ URL::to('admin/activeinactivevendor')}}/{{ $vendor->id }}">
                  @if($vendor->user_status==TRUE)
                    <small class="label label-success">ACTIVE</small>
                  @else
                  
                    <small class="label label-danger">INACTIVE</small>
                  
                  @endif
                  </a>
                  <td> <a href="{{ URL::to('admin/addeditadmin')}}/{{ $vendor->id }}"><i class="fa fa-fw fa-edit"></i><a href="{{ URL::to('admin/deletevendor')}}/{{ $vendor->id }}"><i class="fa fa-fw fa-remove"></i></a><i class="fa fa-fw fa-eye"></i></td>
                  
                </tr>
                @endforeach
                </tbody>
              </table>
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
  </div>
  <!-- /.content-wrapper -->
@endsection