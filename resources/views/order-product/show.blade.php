@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- @include('admin.sidebar') -->

            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                    
                        <div class="col-md-4">
                            <div style="margin-left:10px;margin-top:-10px;">
                                <br>
                                <a href="{{ url('/order-product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                @if (Auth::user()->role === "admin" )
                                <!-- <a href="{{ url('/order-product/' . $orderproduct->id . '/edit') }}" title="Edit orderproduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> -->
                                
                                
                            </div>
                            <img style="width: 100%;object-fit: contain;" src="{{ url('storage/'.$orderproduct->product->photo)}}" width="120" />
                        </div>
                        <div class="col-md-8 card-body">
                            <div>
                                <div class="float-right" style="margin-right:15px">
                                    <form  method="POST" action="{{ url('/order-product' . '/' . $orderproduct->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="ลบสินค้า" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="far fa-trash-alt"></i></button>
                                    @endif
                                    <form>
                                </div>
                                <h5 style="width:90%"><b>{{ $orderproduct->product->title }}</b></h5>
                                <hr>
                                <h5>รายละเอียดสินค้า</h5>
                                <p style="text-indent:15px">{{ $orderproduct->product->content }}</p>
                                <p>จำนวน {{ $orderproduct->quantity }} ชิ้น</p>
                                
                                <p>ราคาต่อชิ้น ฿ {{ $orderproduct->product->price }}
                                @if (Auth::user()->role === "admin" )
                                <spam style="color:gray;font-size:14px">ต้นทุน ฿ {{ $orderproduct->product->cost }}</span>
                                @endif
                                </p>
                                <h5>รวม <b style="color:red">฿ {{ $orderproduct->total }}</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">OrderProduct {{ $orderproduct->id }}</div>
                    <div class="card-body">

                    
                        <a href="{{ url('/order-product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if (Auth::user()->role === "admin" )
                        <a href="{{ url('/order-product/' . $orderproduct->id . '/edit') }}" title="Edit OrderProduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <form method="POST" action="{{ url('orderproduct' . '/' . $orderproduct->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete OrderProduct" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        @endif
                        </form>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $orderproduct->id }}</td>
                                    </tr>
                                    <tr><th> Order Id </th><td> {{ $orderproduct->order_id }} </td></tr><tr><th> Product Id </th><td> {{ $orderproduct->product_id }} </td></tr><tr><th> User Id </th><td> {{ $orderproduct->user_id }} </td></tr><tr><th> Quantity </th><td> {{ $orderproduct->quantity }} </td></tr><tr><th> Price </th><td> {{ $orderproduct->price }} </td></tr><tr><th> Total </th><td> {{ $orderproduct->total }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> -->
        </div>
    </div>
@endsection
