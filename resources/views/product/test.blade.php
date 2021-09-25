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
<p class="text-center" style="font-size:28px; "> <b>รายงานสินค้า</b> </p>
<div class="container">
        <div class="row">
        
        <table id="stock" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                        <th>รหัสสินค้า</th> <th>รูปสินค้า</th> <th>ชื่อสินค้า</th><th>จำนวน</th><th>ราคา</th><th>ต้นทุน</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach($product as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td class="text-center"><img width="164px" src="{{ url('storage/'.$item->photo )}}" alt="..." /></td>
                                <td>{{ $item->title }} </td>
                                
                                  <td>{{ $item->quantity }}</td>  
                               
                                <td>{{  number_format($item->price) }}</td>      
                                <td>{{  number_format($item->cost) }}</td>  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>