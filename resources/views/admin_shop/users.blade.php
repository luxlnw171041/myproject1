@extends('layouts.admin')

@section('content')
<!-- Main content -->
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
              <li class="breadcrumb-item active">สมาชิก</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ข้อมูลสมาชิก</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>รหัสสมาชิก</th>
                    <th>ชื่อสมาชิก</th>
                    <th>อีเมล</th>
                    <th>สถานะ</th>
                    <th>เครื่อมือ</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> {{ $user->role }}</td>
                    <td class="text-center">
                        <a class="btn btn-primary btn-sm" href="{{ url('admin/users/' . $user->id . '/edit') }}" title="Edit User">Edit</a>
                        
                        <a href="#" data-toggle="modal" data-target="#ModalEdit{{$user->id}}" title="asd">asdad</a>
                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        @if (Auth::user()->role === "admin" )
                            <form method="POST" action="{{ url('admin/users/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <!-- <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> -->
                            
                            </form>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                  
                  @include('modal.edit')


                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Recipient:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Message:</label>
                              <textarea class="form-control" id="message-text"></textarea>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </tfoot>
                </table>
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



    <!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">User

                    @if (Auth::user()->role  == "admin" )
                        <a href="{{ url('admin/users/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        
                    <form method="GET" action="{{ url('admin/users') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        @endif
                        </div>
                    <div class="card-body">
                      

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            
                                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" title="Edit User">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @if (Auth::user()->role === "admin" )
                                            <form method="POST" action="{{ url('admin/users/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            
                                            </form>
                                        @endif
                                            
                                        
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->

@endsection
