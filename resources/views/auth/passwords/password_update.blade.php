
<div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h4 class="modal-title">تغییر کلمه عبور</h4>
</div>
<div class="modal-body">
    <form  id="frm_password_up" method="POST" action="{{route('user.update',1)}}">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <label for="old_password" >کلمه عبور قدیمی</label>

                    <input id="old_password" class="form-control" placeholder="" name="old_password" value="" required  type="password">
                    @if ($errors->has('old_password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                    @endif

                </div>

                <div class="form-group">
                    <label for="new_password" >کلمه عبور جدید</label>


                    <input id="new_password" class="form-control" name="new_password" required type="password">
                    @if ($errors->has('new_password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group">
                    <label for="confirm_password" >تکرار کلمه عبور</label>


                    <input id="confirm_password" class="form-control" name="confirm_password" required type="password">
                    @if ($errors->has('confirm_password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="answer-area">

                </div>


            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button class="btn btn-danger" data-dismiss="modal">انصراف</button>
    <a href="javascript:;" onclick="password_update();" class="btn btn-primary">تغییر</a>

    <script>
        function password_update()
        {

          $.ajax({
              url:'{{route('user.update',2)}}',
              data:$('#frm_password_up').serialize(),
              method:'post',
              success:function (response)
              {
                  if(response==1)
                  {

                      $('.answer-area').html('<span style="color:green" >کلمه عبور شما با موفقیت تغییر یافت</span>')
                  }else if(response==0)
                  {
                      $('.answer-area').html('<span style="color:green" >درخواست شما با خطا مواجه شد لطفا پس از اطمینان از ورودی ها مجداد اقدام فرمایید.</span>')
                  }else
                  {
                      $('.answer-area').html('<span style="color:green" >تکرار پسورد یکسان نمیباشد</span>')
                  }

                  setTimeout(function(){ location.reload()}, 3000);

              }

          });

        }

    </script>
</div>



