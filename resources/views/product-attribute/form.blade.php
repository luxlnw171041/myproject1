<div class="form-group {{ $errors->has('productattribute_id') ? 'has-error' : ''}}">
    <label for="productattribute_id" class="control-label">{{ 'Productattribute Id' }}</label>
    <input class="form-control" name="productattribute_id" type="number" id="productattribute_id" value="{{ isset($productattribute->productattribute_id) ? $productattribute->productattribute_id : ''}}" >
    {!! $errors->first('productattribute_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($productattribute->product_id) ? $productattribute->product_id : ''}}" >
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ 'Size' }}</label>
    <input class="form-control" name="size" type="text" id="size" value="{{ isset($productattribute->size) ? $productattribute->size : ''}}" >
    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
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
</div>
<!-- <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="number" id="status" value="{{ isset($productattribute->status) ? $productattribute->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div> -->
<!-- <div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
    <label for="created_at" class="control-label">{{ 'Created At' }}</label>
    <input class="form-control" name="created_at" type="datetime-local" id="created_at" value="{{ isset($productattribute->created_at) ? $productattribute->created_at : ''}}" >
    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('updated_at') ? 'has-error' : ''}}">
    <label for="updated_at" class="control-label">{{ 'Updated At' }}</label>
    <input class="form-control" name="updated_at" type="datetime-local" id="updated_at" value="{{ isset($productattribute->updated_at) ? $productattribute->updated_at : ''}}" >
    {!! $errors->first('updated_at', '<p class="help-block">:message</p>') !!}
</div> -->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
