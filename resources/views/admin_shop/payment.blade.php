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
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">รายการชำระเงิน</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div>
      <h1 class="col-md-12 text-center">รายการชำระเงิน</h1><br>
    </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="payment" class="table table-bordered table-striped" >
                  <thead class="text-center">
                  <tr>
                  <tr>
                    <th>เวลาชำระเงิน</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>เลขสั่งซื้อ</th>
                    <th>ราคา</th>
                    <th>หลักฐานการชำระเงิน</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทรศัพท์</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  @foreach($payment as $item)
                  <tr>
                    <td>{{ $item->created_at->thaidate('l j F Y') }} <br> เวลา {{ $item->created_at->format('H:m') }}</td>
                                <!-- <td class="text-center">{{ $item->created_at->format('l d F Y') }}  <br> Time {{ $item->created_at->format('H:i') }}</td> -->
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->order_id }}</td>
                    <td>{{ $item->total }}</td>
                    <td>
                        <a href="{{ url('/storage/'.$item->slip )}}" data-toggle="lightbox" data-title="sample 12 - black" data-gallery="gallery">
                            <img src="{{ url('/storage/'.$item->slip )}}" width="100" />
                        </a>
                    </td>
                    <td>{{ $item->address }}</td>

                    @if(!empty($item->tel))
                      <td>0{{ $item->tel}}</td>
                    @else
                      <td>{{ $item->tel}}</td>
                    @endif

                  </tr>
                  @endforeach
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


<!-- 
    <div class="container">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Payment

                    <div style="margin-top:-20px">
                        <form method="GET" action="{{ url('/payment') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    </div>
                    
                    <div class="card-body">
                    

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ราคารวม</th>
                                        <th>รหัสผู้ใช้</th>
                                        <th>รหัสออร์เดอร์</th>
                                        <th>สลิป</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach($payment as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>
                                            <div class="grid">
                                                <a href="{{ url('/storage/'.$item->slip )}}" data-toggle="lightbox" data-title="sample 12 - black" data-gallery="gallery">
                                                    <img src="{{ url('/storage/'.$item->slip )}}" width="100" />
                                                </a>
                                            </div>
                                        <td>
                                            
                                            <a href="{{ url('/payment/' . $item->id) }}" title="View Payment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if(Auth::user()->role == "admin")
                                            <a href="{{ url('/payment/' . $item->id . '/edit') }}" title="Edit Payment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/payment' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $payment->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
