
@if (Auth::user()->role  == "admin" )
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
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
              <li class="breadcrumb-item active">รายงานรายวัน</li>
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
                <h3 class="card-title">รายงานรายวัน</h3>
              </div><br>
                <form method="GET" action="{{ url('/order-product/reportdaily') }}" accept-charset="UTF-8" >
                    <div class="form-row" >
                        <div class="col-4" style="margin-left:22px">
                            <input type="date" class="form-control" name="date" placeholder="Search..." value="{{ request('date') }}" >
                        </div>
                        <div class="col-4">
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>               
                </form>
              <!-- /.card-header -->
              <div class="card-body"style="margin-top:-40px">
                <table id="example3" class="table table-bordered table-striped" >
                  <thead class="text-center">
                  <tr>
                  <th>user</th><th>วันที่สั่งซืื้อ</th><th>เลขที่สั่งซื้อ</th><th>สินค้า</th><th>จำนวน</th><th>ราคา</th><th>รวม</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  @foreach($orderproduct as $item)
                  <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->created_at  }}</td>
                    <td>{{ $item->order_id }}</td>
                    <td>                                            
                        <div><img src="{{ url('storage/'.$item->product->photo )}}" width="100" /> </div>                                            
                        <div>{{ $item->product->title }}</div>
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->total }}</td>    
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
                <h2>รวมราคาสินค้า {{ number_format($orderproduct->sum('total')) }} บาท</h2>
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
    @endif

    @if (Auth::user()->role  == "guest" )
<!-- 
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header">รายงานรายวัน</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/order-product/reportdaily') }}" accept-charset="UTF-8" >
                            <div class="form-row">
                                <div class="col-4">
                                    <input type="date" class="form-control" name="date" placeholder="Search..." value="{{ request('date') }}" >
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>               
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">รายงานวันที่ : {{ request('date') }}</div>
                    <div class="card-body">                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>สมาชิก</th><th>วันที่สั่งซืื้อ</th><th>เลขที่สั่งซื้อ</th><th>สินค้า</th><th>จำนวน</th><th>ราคา</th><th>รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderproduct as $item)
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->created_at  }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>                                            
                                            <div><img src="{{ url('storage/'.$item->product->photo )}}" width="100" /> </div>                                            
                                            <div>{{ $item->product->title }}</div>
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->total }}</td>                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                           
                        </div>
                        <h2>รวมราคาสินค้า {{ number_format($orderproduct->sum('total')) }} บาท</h2>

                        


                    </div>
                </div>
            </div>
        </div>
    </div> -->
    @endif
@endsection