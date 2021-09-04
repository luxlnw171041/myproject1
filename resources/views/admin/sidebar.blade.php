<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist" style="flex-direction: column;">
                <li role="presentation">
                    <a href="{{ url('/product') }}">
                        <i class="fa fa-home"></i> หน้าหลัก
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/order-product') }}">
                        <i class="fa fa-shopping-cart"></i> ตะกร้าของฉัน
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/order') }}">
                        <i class="fa fa-box"></i> คำสั่งซื้อของฉัน
                    </a>
                </li>

                @if(Auth::check())
                    @if(Auth::user()->role == "admin")
                    
                    <li role="presentation">
                        <a href="{{ url('/order-product/reportdaily') }}">
                            <i class="fa fa-file"></i> รายงานรายวัน
                        </a>
                    </li>
                    
                    <li role="presentation">
                        <a href="{{ url('/order-product/reportmonthly') }}">
                            <i class="fa fa-file"></i> รายงานรายเดือน
                        </a>
                    </li>
                    
                    <li role="presentation">
                        <a href="{{ url('/order-product/reportyearly') }}">
                            <i class="fa fa-file"></i> รายงานรายปี
                        </a>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>