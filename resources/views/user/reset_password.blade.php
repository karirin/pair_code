@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col-6 offset-3 center user_login_top">
        <h2 style="margin-top: 5rem;">パスワード再設定</h2>
        <form action="/user/reset_password_send" method="post">
            @csrf
            <div class="user_title">新しいパスワード</div>
            <input type="password" name="password" class="user_pass_input form-control" autocomplete="off">
            <div class="error_pass_form" style="height: 27px;text-align:left;margin: 0 20%;">
                <span class="user_pass_error" style="display:none;color: #dc3545;">パスワードを入力してください</span>
            </div>
            <div class="flex_btn" style="margin-top: 2.5rem;">
                <input class="btn btn-outline-info reset_btn" type="submit" value="パスワードを変更">
            </div>
            <input type="hidden" name="email" value="{{$email}}">
        </form>
    </div>
</div>
@endsection
@section('footer')
@parent
<script>
    $(document).on('click', '.reset_btn', function() {

        var error = 0;

        if ($('.user_pass_input')[0].value == '') {
            $('.user_pass_input')[0].setAttribute("style", "border-color: #dc3545;");
            $('.user_pass_error').fadeIn();
            error++;
        }
        if (0 < error) {
            return false;
        }

    });

    // 必須チェック解除
    $(document).ready(function() {
        $('.user_pass_input').change(function() {
            var str = $(this).value;
            if (str != '') {
                $('.user_pass_input').css("border-color", "#ced4da");
                $('.user_pass_error').fadeOut();
            }
        });
    });
</script>
@endsection