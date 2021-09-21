
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($user->id) ? $user->id : ''}}" readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group display-none{{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}"  required>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@if (Auth::user()->role === "admin" )
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <input class="form-control" name="role" type="text" id="role" value="{{ isset($user->role) ? $user->role : ''}}" required>
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
@endif

<!-- 
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'save' : 'Create' }}">
</div> -->
