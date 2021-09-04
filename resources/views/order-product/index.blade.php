@extends('layouts.app')

@section('content')
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
                        <h2 class="text-center">ตะกร้าสินค้า</h2>
                        @foreach($orderproduct as $item)
                        <div class="table-responsive">
                            
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <center>
                                            <img style="width: 100px;height: 120px;object-fit: contain;" src="{{ url('storage/'.$item->product->photo)}}" width="120" />
                                        </center>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>{{ $item->product->title }}</h5>
                                        <td>{{ $item->user->name }}</td>
                                        <h6>จำนวน {{ $item->quantity }} ชิ้น</h6>
                                        <h6>ราคาต่อชิ้น ฿ {{ number_format($item->price) }}</h6>
                                        <h6>ยอดรวม ฿ {{ number_format($item->total) }}</h6>
                                    </div>
                                    <div class="col-md-1">

                                    <a href="{{ url('/order-product/' . $item->id) }}" title="ดูรายละเอียดสินค้า"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <!-- <a href="{{ url('/order-product/' . $item->id . '/edit') }}" title="แก้ไข"><button  style="margin-top:10px;" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a> -->

                                            <form method="POST" action="{{ url('/order-product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button  style="margin-top:10px;" type="submit" class="btn btn-danger btn-sm" title="ลบสินค้า" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                    </div>
                                </div>
                            </div>


                            <!-- <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>รหัสออร์เดอร์</th>
                                        <th>รูป</th>
                                        <th>รหัสผู้ใช้</th>
                                        <th>จำนวน</th>
                                        <th>ราคา</th>
                                        <th>ราคารวม</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>
                                        <div><img src="{{ url('storage/'.$item->product->photo)}}" width="100" /> </div>            
                                        <div>{{ $item->product->title }}</div>
                                        </td>
                                        <td>{{ $item->user->name }} </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>
                                            <a href="{{ url('/order-product/' . $item->id) }}" title="View OrderProduct"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/order-product/' . $item->id . '/edit') }}" title="Edit OrderProduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/order-product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete OrderProduct" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table> -->@endforeach
                            <div class="pagination-wrapper"> {!! $orderproduct->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                         <form method="POST" action="{{ url('/order') }}" accept-charset="UTF-8" class="form-horizontal text-center" enctype="multipart/form-data">
                            {{ csrf_field() }}

                        <h1>รวมราคาสินค้า <b style="color:red;">{{ number_format($orderproduct->sum('total')) }}</b> บาท</h1>

                        <button class="btn btn-primary" type="submit">
                            สั่งสินค้า
                        </button>    
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
