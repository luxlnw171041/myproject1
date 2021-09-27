
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: normal;
 src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: bold;
 src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: normal;
 src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: bold;
 src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
}
body{
 font-family: "THSarabunNew";
 font-size: 16px;
}
@page {
      size: A4;
      padding: 15px;
    }
    @media print {
      html, body  {
        width: 210mm;
        height: 297mm;
        /*font-size : 16px;*/
      }
    }
</style>
   
<p class="text-center" style="font-size:28px; "> ยอดขายวัน {{ thaidate("l j F Y" , strtotime($date)) }} </p>
<div class="container">
        <div class="row">
        <table  class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                        <th>ชื่อผู้ใช้</th><th>เวลาสั่งซื้อ</th><th>รหัสสั่งซื้อ</th><th>สินค้า</th><th>จำนวน</th><th>ราคา</th><th>รวม</th><th>ต้นทุน</th>
                    </tr>
                  </thead>
                    <tbody>
                    @foreach ($orderproduct as $item)
                    <tr>
                        <td>{{ $item->user->name }}</td>
                        <td> {{ $item->created_at->thaidate('l j F Y') }} <br> เวลา {{ $item->created_at->format('h:i') }}</td>
                        <td>{{ $item->order_id }}</td> 
                        <td>                                            
                            <div><img src="{{ url('storage/'.$item->product->photo )}}" width="100" /> </div>                                            
                            <div>{{ $item->product->title }}</div>
                        </td>
                        <td>{{ $item->sum_quantity }} </td>
                        <td>{{ number_format($item->avg_price) }}</td>
                        <td>{{ number_format($item->sum_total) }}</td>    
                        <td>{{ number_format($item->sum_cost) }}</td>    
                    </tr>
                    @endforeach 
                    </tbody>
                </table>
               
               </div>
               
    </div>
   