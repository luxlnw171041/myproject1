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
    <div class="col-md-6 form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
        <label for="photo" class="control-label">{{ 'รูปสินค้า' }}</label>
        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($product->photo) ? $product->photo : ''}}" required>
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
        <label for="quantity" class="control-label">{{ 'จำนวน' }}</label>
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($product->quantity) ? $product->quantity : ''}}" required>
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
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
