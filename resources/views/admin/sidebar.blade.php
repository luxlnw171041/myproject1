<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            เมนู
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
        <li role="presentation">
            <a href="{{ url('/order') }}">
                <i class="fa fa-box"></i> คำสั่งซื้อของฉัน
            </a>
        </li>
        <li role="presentation">
                    <a href="{{ url('/payment') }}">
                        <i class="fa fa-credit-card"></i> แจ้งการชำระเงิน
                    </a>
                </li>
        </li>
            </ul>
        </div>
    </div>
</div>
