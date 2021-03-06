@extends('layouts.app')

@section('content')
<div>
    <h1 class="col-md-12 text-center">ตะกร้าสินค้า</h1><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">Orderproduct</div> -->
                    <div class="card-body">
                        <!-- @if (Auth::user()->role === "admin" )
                        <a href="{{ url('/order-product/create') }}" class="btn btn-success btn-sm" title="Add New OrderProduct">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
                        <form method="GET" action="{{ url('/order-product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> -->

                        <section class="py-5" style="margin-top:-20px">
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 text-center" scope="col"> <strong class="text-small text-uppercase">สินค้า</strong></th>
                      <th class="border-0 text-center" scope="col"> <strong class="text-small text-uppercase">ขนาด</strong></th>
                      <th class="border-0 text-center" scope="col"> <strong class="text-small text-uppercase">ราคา</strong></th>
                      <th class="border-0 text-center" scope="col"> <strong class="text-small text-uppercase">จำนวน</strong></th>
                      <th class="border-0 text-center" scope="col"> <strong class="text-small text-uppercase">รวม</strong></th>
                      <th class="border-0 text-center" scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($orderproduct as $item)   
                    <tr style="padding:0px">
                        <th class="pl-0 border-0" scope="row" >
                              <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.html"><img style="width: 100px;height: 120px;object-fit: contain;" src="{{ url('storage/'.$item->product->photo)}}" width="120" />
                              <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html"> <b class="text-dark">{{ $item->product->title }}</b> </a></strong></div>
                        </th>
                        <td class="align-middle border-0 text-center">
                            <p class="mb-0 small text-center"> {{ $item->size }} </p>
                        </td>
                        <td class="align-middle border-0" style="padding:0px">
                            <p class="mb-0 small text-center">฿ {{ number_format($item->price) }}</p>
                        </td>
                        <td class="align-middle border-0">
                            <p class="mb-0 small text-center">{{ $item->quantity }}   </p>
                        </td>
                        
                        <td class="align-middle border-0" style="padding:0px">
                            <p class="mb-0 small text-center">฿ {{ number_format($item->total) }}</p>
                        </td>
                        <td class="align-middle border-0">
                            <form method="POST" action="{{ url('/order-product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    <button  style="margin-top:10px;" type="submit" class="btn btn-danger btn-sm" title="ลบสินค้า" onclick="return confirm(&quot;ต้องการลบใช่หรือไม่?&quot;)"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                            
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="{{ url('/product') }}"><i class="fas fa-long-arrow-alt-left mr-2"> </i>ซื้อสินค้าต่อ</a></div>
                  
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">ยอดรวมรถเข็น</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">ยอดรวม</strong><span class="text-muted small">{{ number_format($orderproduct->sum('total')) }}</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">รวม</strong><span>{{ number_format($orderproduct->sum('total')) }}</span></li>
                    <li>
                        <div class="form-group mb-0">
                            <form method="POST" action="{{ url('/order') }}" accept-charset="UTF-8" class="form-horizontal text-center" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <button class="btn btn-dark btn-sm btn-block" type="submit"> ชำระเงิน</button>
                            </form>
                        </div>
                      </form> 
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
                        
@endsection
