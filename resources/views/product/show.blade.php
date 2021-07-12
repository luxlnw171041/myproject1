@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product {{ $product->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if (Auth::user()->role === "admin" )
                        <a href="{{ url('/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <form method="POST" action="{{ url('product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        @endif
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>รหัสสินค้า</th><td>{{ $product->id }}</td>
                                    </tr>
                                    <tr><th> ชื่อสินค้า </th><td> {{ $product->title }} </td></tr>
                                    <tr><th> รายละเอียดสินค้า </th><td> {{ $product->content }} </td></tr
                                    ><tr><th> ราคา </th><td> {{ $product->price }} </td></tr>
                                    @if (Auth::user()->role === "admin" )
                                    <tr><th> ต้นทุน </th><td> {{ $product->cost }} </td></tr>
                                    @endif
                                    <tr><th> รูปสินค้า </th><td> <img src="{{ url('storage/'.$product->photo )}}" width="100" /></td> </tr>
                                    <!-- <tr><th> จำนวน </th><td> {{ $product->quantity }} </td></tr> -->
                                </tbody>
                            </table>
                        </div>
                        <form method="POST" action="{{ url('/order-product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                             {{ csrf_field() }}

                             <input class="d-none" name="order_id" type="number" id="order_id" value="" >                                
                             <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $product->id }}" >                                
                            <input class="d-none" name="user_id" type="number" id="user_id" value="" >           
                            <hr>                     
                            <input class="" name="quantity" type="number" id="quantity" value="1" >                                
                             <input class="d-none" name="price" type="number" id="price" value="{{ $product->price }}" >                                
                            <input class="d-none" name="total" type="number" id="total" value="" >

                            <button type="submit" class="btn btn-sm btn-warning" >
                              <i class="fa fa-shopping-cart"></i> เพิ่มสินค้าลงตะกร้า 
    </button> &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:gray">มีสินค้า {{ $product->quantity }} ชิ้น</span>
    
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
