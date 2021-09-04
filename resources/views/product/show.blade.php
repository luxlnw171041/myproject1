@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                    <!-- <div class="card-header">Product {{ $product->id }}</div> -->
                        <div class="col-md-4">
                            <div style="margin-left:10px;margin-top:-10px;">
                                <br>
                                <a href="{{ url('/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                @if (Auth::user()->role === "admin" )
                                <a href="{{ url('/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <form method="POST" action="{{ url('product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                @endif
                                </form>
                            </div>
                            <img src="{{ url('storage/'.$product->photo )}}" width="100%" />
                        </div>
                        <div class="col-md-8 card-body">

                            <!-- <a href="{{ url('/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            @if (Auth::user()->role === "admin" )
                            <a href="{{ url('/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                            <form method="POST" action="{{ url('product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            @endif
                            </form>
                            <br/>
                            <br/> -->
                            <div>
                                <h5><b>{{ $product->title }}</b></h5>
                                <hr>
                                <h5>รายละเอียดสินค้า</h5>
                                <p style="text-indent:15px">{{ $product->content }}</p>
                                <h5 style="color:red;">฿ {{ $product->price }}
                                @if (Auth::user()->role === "admin" )
                                <spam style="color:gray;font-size:14px">ต้นทุน ฿ {{ $product->cost }}</span>
                                @endif
                                </h5>
                                <!-- <div class="col-md-3">
                                    <select class="form-control" >
                                        @if(!empty($size))
                                            <option value="">เลือกขนาด</option>   
                                            @foreach($size as $item)
                                                <option value="">
                                                        {{ $item->size }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>

                                    <select class="form-control">
                                        @if(!empty($color))
                                            <option value="">เลือกสี</option>   
                                            @foreach($color as $item)
                                                <option value="">
                                                        {{ $item->color }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>

                                    <select class="form-control">
                                        @if(!empty($stock))
                                            <option value="">เลือกสี</option>   
                                            @foreach($stock as $item)
                                                <option value="">
                                                        {{ $item->stock }}
                                                </option>   

                                            @endforeach
                                        @else
                                            <option value="" selected></option> 
                                        @endif
                                    </select>
                                </div> -->
                            </div>
                           
                            <!-- <div class="table-responsive">
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
                                        <tr><th> จำนวน </th><td> {{ $product->quantity }} </td></tr>
                                    </tbody>
                                </table>
                            </div> -->
                            @if(!empty($product->quantity)>0)
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
                                @else
                                    <hr>
                                    </button> &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red">สินค้าหมด!!</span>
                                @endif
                        </div>
                        <!-- <div id="example-1" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
	<div class="row">
		<div class="col-md-12"><button type="button" id="btnAdd-1" class="btn btn-primary">Add section</button></div>
	</div>
	<div class="row group">
		<div class="col-md-2">
			<input class="form-control" type="text">
		</div>
		<div class="col-md-2">
			<input class="form-control" type="text">
		</div>
		<div class="col-md-4">
			<textarea></textarea>
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-danger btnRemove">Remove</button>
		</div>
	</div>
</div> -->
                    </div><br>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
$('#example-1').multifield();
</script>
