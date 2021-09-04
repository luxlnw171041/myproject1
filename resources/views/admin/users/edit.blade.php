@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลสมาชิก</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">แก้ไขข้อมูลสมาชิก</h3>
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
                    <button type="submit" class="btn btn-info float-right" >Sign in</button>
                    
                    <button class="btn btn-default btn-md" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit User {{ $user->id }}</div>
                    <div class="card-body">
                   
                        <a href="{{ url('admin/users') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                    
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
          

                        <form method="POST" action="{{ url('admin/users/' . $user->id ) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            
                            @include ('admin.users.form', ['formMode' => 'edit'])

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
