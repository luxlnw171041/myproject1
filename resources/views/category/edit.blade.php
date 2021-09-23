
@extends('layouts.admin')

@section('content')

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
                <li class="breadcrumb-item active">แก้ไขหมวดหมู่</li>
                </ol>
            </div>
            
            </div>
            <div>
      <h1 class="col-md-12 text-center">แก้ไขหมวดหมู่</h1><br>
    </div>
    </div><!-- /.container-fluid -->
</section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('admin/category/' . $category->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('category.form', ['formMode' => 'edit'])

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