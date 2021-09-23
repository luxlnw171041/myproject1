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
                <li class="breadcrumb-item"><a href="{{ url('product') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">แก้ไขข้อมูลผู้ใช้</li>
                </ol>
            </div>
            </div>
    </div><!-- /.container-fluid -->
</section>
<div>
      <h1 class="col-md-12 text-center">แก้ไขข้อมูลผู้ใช้</h1><br>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                <form method="POST" action="{{ url('admin/users/' . $user->id ) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                @include ('admin.users.form', ['formMode' => 'edit'])
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">ยืนยัน</button>
                    
                    <a class="btn btn-secondary btn-md" href="javascript:history.back(1)">กลับ</a>
                    </div>
                    <!-- /.card-footer -->
              </form>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
