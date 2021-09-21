@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="POST" action="{{ url('admin/users/' . $user->id ) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                @include ('admin.users.form', ['formMode' => 'edit'])
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" href="javascript:history.back(1)">Update</button>
                    
                    <a class="btn btn-secondary btn-md" href="javascript:history.back(1)">Back</a>
                    </div>
                    <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
         
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
    </section>


   
@endsection
