<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'หมวดหมู่' }}</label>
    <input class="form-control" name="category" type="text" id="category" value="{{ isset($category->category) ? $category->category : ''}}" >
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group d-flex justify-content-end">
    <input class="btn btn-primary " type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
</div>
