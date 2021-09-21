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
                            <div class="col-md-4 filter ">  
                                 <input class="form-control" type="text" name="title" id="title" placeholder="" value="{{ request('title') }}">
                              </div> 
                            <div class="col-md-4 filter ">  
                                 <input class="form-control" type="text" name="pricemin" id="pricemin" placeholder="pricemin" value="{{ request('pricemin') }}">
                              </div>  
                             <div class="col-md-4 filter ">  
                                 <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="pricemax" value="{{ request('pricemax') }}">
                             </div>
                        </div>
                        <div class="form-group"><br>
                            <div class="input-group input-group-lg">
                            <input type="text" class="form-control form-control-lg" name="search" placeholder="Type your keywords here" value="{{ request('search') }}">
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-light bg-info"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
  </div>
        <div class="container" style="margin-bottom:-45px">
            @if (Auth::user()->role  == "admin" )
                <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm " style="float:right;" title="Add New Product">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            @endif
        </div>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($productcat as $item)
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
                                                {{ $item->product->id }}
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
                                        <div class="text-center"><button type="submit" class="btn btn-outline-dark">Add to cart</button></div>
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
                                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red">สินค้าหมด!!</span>
                                    @endif
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            </div>
        </section>
   
    
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