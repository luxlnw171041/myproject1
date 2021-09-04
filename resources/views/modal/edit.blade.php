<form method="POST" action="{{ url('admin/users/' . $user->id ) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit User') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
                        <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($user->id) ? $user->id : ''}}" readonly>
                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label for="name" class="control-label">{{ 'Name' }}</label>
                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group display-none{{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'email' }}</label>
                        <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}"  >
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                    @if (Auth::user()->role === "admin" )
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                        <label for="role" class="control-label">{{ 'Role' }}</label>
                        <input class="form-control" name="role" type="text" id="role" value="{{ isset($user->role) ? $user->role : ''}}" >
                        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
                    </div>
                    @endif
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary float-right" >Summit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>