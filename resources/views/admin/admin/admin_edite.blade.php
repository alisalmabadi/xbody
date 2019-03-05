
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ویرایش مدیر جدید</h4>
    </div>
    <div class="modal-body">
        <form id="admin_up_form" action="{{route('admin.admin.update',$admin)}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">نام</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$admin->name}}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">ادرس ایمیل</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{$admin->email}}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">گذروازه</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">تکرار گذروازه</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">بستن</button>
        <a href="javascript:;" onclick="$('#admin_up_form').submit();" class="btn btn-primary">ویرایش  کابر</a>
    </div>
