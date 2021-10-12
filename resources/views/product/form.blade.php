<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'ชื่อสินค้า' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($product->title) ? $product->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'รายละเอียดสินค้า' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($product->content) ? $product->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('price') ? 'has-error' : ''}}">
        <label for="price" class="control-label">{{ 'ราคา' }}</label>
        <input class="form-control" name="price" type="number" id="price" value="{{ isset($product->price) ? $product->price : ''}}" required>
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
        <label for="cost" class="control-label">{{ 'ต้นทุน' }}</label>
        <input class="form-control" name="cost" type="number" id="cost" value="{{ isset($product->cost) ? $product->cost : ''}}" required>
        {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-12 form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
        <label for="photo" class="control-label">{{ 'รูปสินค้า' }}</label>
        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($product->photo) ? $product->photo : ''}}" >
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>

   

    @if(!empty($edit))
    <div class="col-md-6 form-group {{ $errors->has('size') ? 'has-error' : ''}}">
                    <label for="size" class="control-label">{{ 'ขนาด' }}</label>
                    <input class="form-control" name="size" type="number" id="size" value="{{ isset($product->size) ? $product->size : ''}}" required>
                    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-6 form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
                    <label for="quantity" class="control-label">{{ 'จำนวน' }}</label>
                    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($product->quantity) ? $product->quantity : ''}}" required>
                    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                </div>
    @else
        <div class="col-md-6 form-group {{ $errors->has('size') ? 'has-error' : ''}}">
            <label for="size" class="control-label">{{ 'ขนาด' }}</label>
            <input class="form-control" name="size_{{ $count_start }}" type="text" id="size_{{ $count_start }}" value="{{ isset($product->size) ? $product->size : ''}}" required>
            {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="col-md-6 form-group {{ $errors->has('amount_of_size') ? 'has-error' : ''}}">
            <label for="amount_of_size" class="control-label">{{ 'จำนวน' }}</label>
            <input class="form-control" name="amount_of_size_{{ $count_start }}" type="number" id="amount_of_size_{{ $count_start }}" value="{{ isset($product->amount_of_size) ? $product->amount_of_size : ''}}" required >
            {!! $errors->first('amount_of_size', '<p class="help-block">:message</p>') !!}
        </div>
    @endif
        

    <div class="col-md-12" >
        <div class="row" id="div_content">

        </div>
    </div>

    <div class="col-md-12 form-group {{ $errors->has('amount_of_size') ? 'has-error' : ''}}">
        <a class="btn btn-sm btn-primary" onclick="add_count_all('{{ $count_start }}');">เพิ่ม</a>
    </div>

    <!-- <div class="col-md-6 form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
        <label for="quantity" class="control-label">{{ 'จำนวนทั้งหมด' }}</label>
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($product->quantity) ? $product->quantity : ''}}" readonly>
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div> -->

    <input class="form-control" type="hidden" name="count_all" id="count_all" value="1" readonly >

    
</div>
<!-- <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'category' }}</label>
    <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($orderproduct->category_id) ? $orderproduct->category_id : ''}}" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'category' }}</label>
    <input class="form-control" name="category" type="text" id="category" value="{{ isset($orderproduct->category) ? $orderproduct->category : ''}}" >
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div> -->
 
@if(!empty($product->category_id))
    <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category" class="control-label">{{ 'ประเภท' }}</label>
            <select name="category_id" class="form-control">
                    @php
                        $item = $product->categorys;
                    @endphp
                <option value="0" selected="selected">{{ $item->category }}</option>
                @foreach($category as $item)
                    <option value="{{ isset($item->id) ? $item->id : ''}}">{{ $item->category }}</option>
                @endforeach
            </select>
            {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
@else   
    <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category" class="control-label">{{ 'ประเภท' }}</label>
            <select name="category_id" class="form-control">
                <option value="0" selected="selected">โปรดเลือก</option>
                @foreach($category as $item)
                    <option value="{{ isset($item->id) ? $item->id : ''}}">{{ $item->category }}</option>
                @endforeach
            </select>
            {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
@endif
<!-- <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($productattribute->price) ? $productattribute->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    <label for="stock" class="control-label">{{ 'Stock' }}</label>
    <input class="form-control" name="stock" type="number" id="stock" value="{{ isset($productattribute->stock) ? $productattribute->stock : ''}}" >
    {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($productattribute->color) ? $productattribute->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>   -->

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <a href="#" onclick="goBack()" title="Back"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</button></a>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
        </div>
    </div>
</div>

<script>

    function add_count_all(count_start)
    {

        let count_all = document.querySelector('#count_all');

        let count = count_all.value ;

            count_all.value = parseInt(count_all.value) + parseInt(1);
            // console.log(count_all.value);

        let div_content = document.querySelector('#div_content');

            // ------ ขนาด ------- //
            // div_size
            let div_size = document.createElement("div");
            let div_class_size = document.createAttribute("class");
                div_class_size.value = "col-md-6 form-group";
                
                div_size.setAttributeNode(div_class_size); 

            // label_size
            let label_size = document.createElement("label");
                let label_class_size = document.createAttribute("class");
                label_class_size.value = "form-group";
                label_size.innerHTML = "ขนาด";
                label_size.setAttributeNode(label_class_size); 
                
                
            // input_size
            let input_size = document.createElement("input");
                let input_class_size = document.createAttribute("class");
                input_class_size.value = "form-control";

                let input_name_size = document.createAttribute("name");
                input_name_size.value = "size_"+ count;

                let input_type_size = document.createAttribute("type");
                input_type_size.value = "text";

                let input_id_size = document.createAttribute("id");
                input_id_size.value = "size_"+ count;

                let input_value_size = document.createAttribute("value");
                input_value_size.value = "{{ isset($product->size) ? $product->size : ''}}";

                let input_required_size = document.createAttribute("required");
                input_required_size.value = "";

                input_size.setAttributeNode(input_class_size); 
                input_size.setAttributeNode(input_name_size); 
                input_size.setAttributeNode(input_type_size); 
                input_size.setAttributeNode(input_id_size); 
                input_size.setAttributeNode(input_value_size); 
                input_size.setAttributeNode(input_required_size); 

            div_size.appendChild(label_size);
            div_size.appendChild(input_size);

            // ------ จำนวน ------- //

            // div_amount
            let div_amount = document.createElement("div");
            let div_class_amount = document.createAttribute("class");
                div_class_amount.value = "col-md-6 form-group";
                
                div_amount.setAttributeNode(div_class_amount);

            // label_amount
            let label_amount = document.createElement("label");
                let label_class_amount = document.createAttribute("class");
                label_class_amount.value = "form-group";
                label_amount.innerHTML = "จำนวน";
                label_amount.setAttributeNode(label_class_amount); 

            // input_amount
            let input_amount = document.createElement("input");
                let input_class_amount = document.createAttribute("class");
                input_class_amount.value = "form-control";

                let input_name_amount = document.createAttribute("name");
                input_name_amount.value = "amount_of_size_"+ count;

                let input_type_amount = document.createAttribute("type");
                input_type_amount.value = "text";

                let input_id_amount = document.createAttribute("id");
                input_id_amount.value = "amount_of_size_"+ count;

                let input_value_amount = document.createAttribute("value");
                input_value_amount.value = "{{ isset($product->amount_of_size) ? $product->amount_of_size : ''}}";

                let input_required_amount = document.createAttribute("required");
                input_required_amount.value = "";

                input_amount.setAttributeNode(input_class_amount); 
                input_amount.setAttributeNode(input_name_amount); 
                input_amount.setAttributeNode(input_type_amount); 
                input_amount.setAttributeNode(input_id_amount); 
                input_amount.setAttributeNode(input_value_amount); 
                input_amount.setAttributeNode(input_required_amount); 

            div_amount.appendChild(label_amount);
            div_amount.appendChild(input_amount);

        div_content.appendChild(div_size);
        div_content.appendChild(div_amount);
    }

</script>
