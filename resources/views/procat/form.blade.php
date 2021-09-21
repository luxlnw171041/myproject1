<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($procat->product_id) ? $procat->product_id : ''}}" >
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('catagory_id') ? 'has-error' : ''}}">
    <label for="catagory_id" class="control-label">{{ 'Catagory Id' }}</label>
    <input class="form-control" name="catagory_id" type="number" id="catagory_id" value="{{ isset($procat->catagory_id) ? $procat->catagory_id : ''}}" >
    {!! $errors->first('catagory_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'รหัสสินค้า' }}</label>
    <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($orderproduct->product_id) ? $orderproduct->product_id : ''}}" >
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
