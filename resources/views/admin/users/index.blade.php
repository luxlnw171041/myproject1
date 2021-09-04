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
                <table id="datatable" class="table table-bordered table-striped">
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
                    <div class="btn-group">
                            <a class="btn btn-primary editbtn" data-toggle="modal" data-target="#editModal">Edit</a>
                  </div>
                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" title="Edit User">
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                  
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="{{'users'}}" id="editForm">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                                <label for="user_id" class="control-label">{{ 'User Id' }}</label>
                                <input class="form-control" id="userid" name="user_id" type="text" id="user_id" value="{{ isset($user->id) ? $user->id : ''}}" readonly>
                                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Name' }}</label>
                                <input class="form-control" id="name" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" >
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group display-none{{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="control-label">{{ 'email' }}</label>
                                <input class="form-control" id="email" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}"  >
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            @if (Auth::user()->role === "admin" )
                            <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                                <label for="role" class="control-label">{{ 'Role' }}</label>
                                <input class="form-control" id="role" name="role" type="text" id="role" value="{{ isset($user->role) ? $user->role : ''}}" >
                                {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
                            </div>
                            @endif
                            <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-info float-right" >Submit</button>
                        </div>
                          </form>
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
<script>
  $('document').ready(function(){
    var table = $('#datatable').DataTable();

    table.on('click' , 'edit' , funtion(){

      $tr = $(this).closest('tr');
      if ($($tr).hasClass(guess)) {
        $tr = $tr.prev('.admin');
      }

      var data = table.row($tr).data();
      console.log(data);

      $('#userid').val(data[1]);
      $('#name').val(data[2]);
      $('#email').val(data[3]);
      $('#role').val(data[4]);

      $('#editForm').attr('action' , '/admin/users/'+data[0]);
      $('#editModal').modal('show');
    });
    
  });
</script>