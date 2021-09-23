@extends('layouts.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="GET" action="{{URL::to('/product')}}" accept-charset="UTF-8"  role="search">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-md-3 filter ">  
                                <input class="form-control" type="text" name="title" id="title" placeholder="ชื่อสินค้า" value="{{ request('title') }}">
                            </div> 
                            <div class="col-md-3 filter ">  
                                <select class="form-control" onchange="location = this.options[this.selectedIndex].value;" >
                                    <option value="">เลือกหมวดหมู่</option>   
                                    @foreach($category as $item)
                                        <option value="{{ url('/product') }}?category_id={{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="col-md-3 filter ">  
                                <input class="form-control" type="text" name="category_id" id="category_id" placeholder="category_id" value="{{ request('category_id') }}">
                            </div> -->
                            <div class="col-md-3 filter ">  
                                <input class="form-control" type="text" name="pricemin" id="pricemin" placeholder="ราคาต่ำสุด" value="{{ request('pricemin') }}">
                            </div>  
                            
                            <div class="form-group col-md-3">
                                <div class="input-group input-group-md ">
                                    <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="ราคาสูงสุด" value="{{ request('pricemax') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-light bg-info"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="col-md-2">
                            <select class="form-control" id="category" onchange="location = this.value;">
                                <option value="">ทั้งหมด</option> 
                                @if(!empty($category))
                                    @foreach($category as $item)
                                                        
                                        <option value="{{ url('/product/') }}?category={{ $item->category }}">
                                                {{ $item->category }}
                                        </option>   

                                    @endforeach
                                @else
                                    <option value="" selected></option> 
                                @endif
                            </select>
                        </div> -->
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="container" style="margin-bottom:-45px">
        @if (Auth::user()->role  == "admin" )
            <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm " style="float:right;" title="Add New Product">
                <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มสินค้าใหม่
            </a>
        @endif
    </div>
    @if($product->isNotEmpty())
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($product as $item)
                
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                
                                <!-- Sale badge-->
                                @if (Auth::user()->role === "admin" )
                                    <div class="badge bg-none text-white position-absolute" style="top: 0.5rem; ">
                                                    <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
                                    </div>
                                    <div class="badge bg-none text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                        
                                                    <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                
                                                        <button style="float:right;" type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;ต้องการลบใช่หรือไม่?&quot;)"><i class="far fa-trash-alt"></i></i> </button>
                                                    </form>
                                    </div>
                                @endif  
                                <a href="{{ url('/product/' . $item->id) }}">
                                    <img class="card-img-top" src="{{ url('storage/'.$item->photo )}}" alt="..." />
                                </a>
                                <!-- Product details-->
                                <div class="card-body p-2">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">
                                            <a href="{{ url('/product/' . $item->id) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h5 class="d-flex align-items-end">
                                        <!-- Product price-->
                                        ฿<b>{{ number_format($item->price) }}</b></h5>
                                    </div>
                                    
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent" style="padding:0px">
                                    
                                    @if(!empty($item->quantity)>0)
                                    <form method="POST" action="{{ url('/order-product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="text-center"><button type="submit" class="btn btn-outline-dark">เพิ่มไปยังรถเข็น</button></div>
                                        <input class="d-none" name="order_id" type="number" id="order_id" value="" >                                
                                        <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $item->id }}" >                                
                                        <input class="d-none" name="user_id" type="number" id="user_id" value="" >         
                                        <input class="d-none" name="quantity" type="number" id="quantity" value="1" >                                
                                        <input class="d-none" name="price" type="number" id="price" value="{{ $item->price }}" >                                
                                        <input class="d-none" name="total" type="number" id="total" value="" >
                                        <input class="d-none" name="total" type="number" id="total_cost" value="" >
                                        <input class="d-none" name="cost" type="number" id="cost" value="{{ $item->cost }}" >
                                    </form>
                                    @else
                                        <hr>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red" class="text-center">สินค้าหมด!!</span>
                                    @endif

                                    <!-- <form method="POST" action="{{ url('/product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="text-center"><button type="submit" class="btn btn-outline-dark">Add to cart</button></div>       
                                        <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $item->id }}" >  
                                        
                                        
                                    </form> -->
                                </div>
                            </div>
                        </div> 
                    @endforeach
                    
                </div>
            </div>
        </section>
    @else 
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <h1>ไม่พบสินค้า</h1> 
                </div>
            </div>
        </section>
    @endif
        
   
    
    <!-- <div class="container">
    <div class="col-md-12 card">
        <div class="row d-flex justify-content-center">
           
        
            <div class="col-md-12  card-header">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        @if (Auth::user()->role  == "admin" )
                                        <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                        </a>
                        @endif
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form method="GET" action="{{ url('/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
            </div>
            
            @foreach($product as $item)
            <div class="col-md-2" >
            <div class="row">
                    <br>
                    <div class="card" style="width: 18rem;">
                        <a href="{{ url('/product/' . $item->id) }}">
                            <center><img class="d-flex justify-content-center" style="width: 100%;height: 200px;object-fit: contain;" src="{{ url('storage/'.$item->photo )}}" width="120" /></center>
                            <div class="card-body">
                                <h5 class="card-title" style="margin-top:-10px;white-space: nowrap;width: 150px;overflow: hidden;text-overflow: ellipsis;font-size:15px ">{{ $item->title }} </h5>
                                <p class="card-text">{{ $item->content }}</p>
                                <p style="color:red;float:right">฿<b>{{ number_format($item->price) }}</b></p>
                          
                                
                                @if (Auth::user()->role === "admin" )
                                            <hr style="margin-top:45px">
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            @if (Auth::user()->role === "admin" )
                                                <button style="float:right;" type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="far fa-trash-alt"></i></i> </button>
                                            @endif
                                            </form>
                                @endif  
                            </div>
                        </a>
                    </div>
                </div> 
                <br>
            </div>&nbsp;&nbsp;&nbsp;
            @endforeach -->
            <!-- <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product</div>
                    <div class="card-body">
                    

                        @if (Auth::user()->role  == "admin" )
                        <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
                        <form method="GET" action="{{ url('/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>ชื่อ</th>
                                        <th>รายละเอียด</th>
                                        <th>ราคา</th>
                                        @if (Auth::user()->role === "admin" )
                                        <th>ต้นทุน</th>
                                        @endif
                                        <th>รูปภาพ</th>
                                        <th>จำนวน</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->price }}</td>
                                        @if (Auth::user()->role === "admin" )
                                        <td>{{ $item->cost }}</td>
                                        @endif
                                        <td><img src="{{ url('storage/'.$item->photo )}}" width="120" /></td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            <a href="{{ url('/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if (Auth::user()->role === "admin" )
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endif  
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            @if (Auth::user()->role === "admin" )
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            @endif
                                            </form>
                                        </td>
                                    </tr>

                                    
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                   
                </div>
            </div> -->
        </div>
    </div>
    </div>
@endsection
<style>
/* unvisited link */
a:link {
  color: black;
}

/* visited link */
a:visited {
  color: black;
}

/* mouse over link */
a:hover {
    color:black;
    text-decoration:none;
    cursor:pointer;
}

/* selected link */
a:active {
  color: black;
}
a {
text-decoration: none !important;
color: black;
}
</style>

<script>
            function select_year(){
                var select_year = document.getElementById('select_year').value;
                  // console.log(select_year);
                var input_year = document.getElementById('input_year');
                  input_year.value = select_year;
            }
            function select_month(){
                var select_month = document.getElementById('select_month').value;
                  // console.log(select_month);
                var input_month = document.getElementById('input_month');
                  input_month.value = select_month;
            }
            function select_area(){
                var select_area = document.getElementById('select_area').value;
                  // console.log(select_area);
                var input_area = document.getElementById('input_area');
                  input_area.value = select_area;
            }
              document.addEventListener('DOMContentLoaded', (event) => {
                var input_year = document.getElementById('input_year').value;
                var input_month = document.getElementById('input_month').value;
                var input_area = document.getElementById('input_area').value;

                var select_year = document.getElementById('select_year');
                var select_month = document.getElementById('select_month');
                var select_area = document.getElementById('select_area');

                  select_year.value = input_year ;
                  select_month.value = input_month ;
                  select_area.value = input_area ;

            });
            </script>
</script>