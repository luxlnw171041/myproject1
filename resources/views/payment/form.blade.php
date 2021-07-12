<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'ราคา' }} <span class="text-danger">*</span></label>
    <input class="form-control" name="total" type="number" id="total" value="{{ isset($payment->total) ? $payment->total : ''}}" required>
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group display-none {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'รหัสผู้ใช้' }} </label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($payment->user_id) ? $payment->user_id : Auth::id() }}" readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group display-none {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'รหัสออร์เดอร์' }} </label>
    <input class="form-control" name="order_id" type="number" id="order_id" value="{{ isset($order->id) ? $order->id : Auth::id() }}" readonly>
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('slip') ? 'has-error' : ''}}">
    <label for="slip" class="control-label">{{ 'สลิป' }} <span class="text-danger">*</span></label>
    <input class="form-control" name="slip" type="file" id="slip" value="{{ isset($payment->slip) ? $payment->slip : ''}}" required>
    {!! $errors->first('slip', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'ที่อยู่' }} <span class="text-danger">*</span></label>
    <textarea class="form-control" name="address" type="number" id="address" value="{{ isset($payment->address) ? $payment->address : ''}}" required></textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
<a href="{{ url('/payment') }}" title="Back"><input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}"></a>
</div>
