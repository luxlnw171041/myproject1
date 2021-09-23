@extends('layouts.app')

@section('content')
<div class="content ">
    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">รายการสั่งซื้อ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div>
    <h1 class="col-md-12 text-center">รายการสั่งซื้อ</h1><br>
    </div>
<div class="content " >
      <div class="container-fluid ">
          
        <div class="row d-flex justify-content-center">
          <div class="col-10">
            <div class="card">
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example3" class="table table-bordered table-striped" >
                  <thead class="text-center">
                    <tr>
                        <th>เลขสั่งซื้อ</th>
                        <th>เวลาสั่งซื้อ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>ราคารวม</th>
                        <th>สถานะ</th>
                        <th>ยืนยันรับสินค้า</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach($order as $item)
                        <tr>
                            <td>
                                {{ $item->id }} &nbsp;
                                <a href="{{ url('/order/' . $item->id) }}" title="View OrderProduct"><i class="fas fa-eye"></i></a>
                            </td>
                            <td class="text-center">{{ $item->created_at->thaidate('l j F Y') }} <br> เวลา {{ $item->created_at->format('H:m') }}</td>
                            <!-- <td class="text-center">{{ $item->created_at->format('l d F Y') }}  <br> Time {{ $item->created_at->format('H:m') }}</td> -->
                            <td>{{ $item->user['name'] }} </td>
                            
                            <!--td>{{ $item->remark }}</td-->
                            <td>฿{{ number_format($item->total) }}</td>
                            <td>
                                
                                @switch($item->status)
                                    @case("created") 
                                        <div>รอหลักฐานการชำระเงิน</div>
                                        <div class="row">
                                            <div class="col-sm-6 d-flex justify-content-end"> 
                                                <a class="btn btn-sm btn-primary" href="{{ url('payment/create?order_id='.$item->id) }}">ส่งหลักฐาน</a>
                                            </div>
                                            <div class="col-sm-6 d-flex justify-content-start"> 
                                                <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <select class="d-none" name="status" id="status">
                                                    <option value="cancelled">ยกเลิกออร์เดอร์</option>
                                                </select>
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)">ยกเลิกออร์เดอร์</button>       
                                                </form>
                                            </div>
                                        </div>
                                    @break
                                    @case("checking") 
                                        <div>รอตรวจสอบ</div>
                                        <div><img src="{{ asset("storage/{$item->payment->slip}")  }}" width="100" /></div>
                                        @if(Auth::user()->role == "admin")
                                            <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <select class="" name="status" id="status" >
                                                    <option value="paid">ชำระเงินเรียบร้อย</option>
                                                    <option value="cancelled">ยกเลิกออร์เดอร์</option>
                                                </select>
                                                <button class="btn btn-primary btn-sm" type="submit">เปลี่ยนสถานะ</button>       
                                            </form>
                                        @endif
                                    @break
                                    @case("paid") 
                                        <div>ชำระเงินแล้ว รอเลข tracking</div>
                                        @if(Auth::user()->role == "admin")
                                        <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}                                                            
                                            <input name="tracking" type="text" id="tracking" value="" placeholder="ใส่เลข tracking...">
                                            <input name="status" type="hidden" id="status" value="completed" >
                                            <button class="btn btn-primary btn-sm" type="submit">ส่งเลข Tracking</button>       
                                        </form>
                                        @endif
                                        @break
                                    @case("completed") 
                                        <div>ส่งสินค้าแล้ว</div>
                                        <div>เลขติดตามพัสดู</div>
                                        <div>{{ $item->tracking }}</div>
                                        @break
                                    @case("cancelled") 
                                        <div>ยกเลิกออร์เดอร์แล้ว</div>                                                    
                                        @break
                                @endswitch
                            </td>
                            <td>
                            @switch($item->status)
                                @case("completed") 
                                    @if(!empty($item->confirm))
                                        @if(Auth::user()->role == "admin")
                                            ลูกค้า{{ $item->confirm }}
                                        @endif
                                        @if(Auth::user()->role == "guest")
                                            {{ $item->confirm }}
                                        @endif
                                    @elseif($item->confirm == null)
                                        @if(Auth::user()->role == "admin")
                                            ลูกค้ายังไม่ได้รับสินค้า
                                        @endif
                                        @if(Auth::user()->role == "guest")
                                            ยังไม่ได้รับสินค้า
                                            <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                    <input class="d-none form-control" name="status" type="text" id="status" value="{{ isset($item->status) ? $item->status : ''}}" >
                                                    <input class="d-none form-control" name="confirm" type="text" id="confirm" value="{{ isset($item->confirm) ? $item->confirm : 'ได้รับสินค้าแล้ว'}}" >                  
                                                    <div><button type="submit" class="btn btn-primary">ได้รับสินค้าแล้ว</button></div>
                                            </form>
                                        @endif
                                    @endif
                                @break
                            @endswitch
                            </td>
                            <!--td>{{ $item->checking_at }}</td><td>{{ $item->paid_at }}</td><td>{{ $item->cancelled_at }}</td><td>{{ $item->completed_at }}</td-->
                            <!--td>{{ $item->tracking }}</td-->
                        </tr>
                        @endforeach
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
    </div>
</div>
<div class="row">
    <div class="col-md-6"> 
        
    </div>
</div>
@endsection
