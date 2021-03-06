<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'รหัสออร์เดอร์' }}</label>
    <input class="form-control" name="order_id" type="number" id="order_id" value="{{ isset($orderproduct->order_id) ? $orderproduct->order_id : ''}}" >
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'รหัสสินค้า' }}</label>
    <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($orderproduct->product_id) ? $orderproduct->product_id : ''}}" >
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'รหัสผู้ใช้' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($orderproduct->user_id) ? $orderproduct->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'จำนวน' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($orderproduct->product->quantity) ? $orderproduct->product->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'ราคา' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($orderproduct->price) ? $orderproduct->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'รวม' }}</label>
    <input class="form-control" name="total" type="number" id="total" value="{{ isset($orderproduct->total) ? $orderproduct->total : ''}}" >
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
    <label for="cost" class="control-label">{{ 'cost' }}</label>
    <input class="form-control" name="cost" type="number" id="cost" value="{{ isset($orderproduct->cost) ? $orderproduct->cost : ''}}" >
    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
