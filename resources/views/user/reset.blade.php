@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col-6 offset-3 center user_login_top">
        <h2 style="margin-top: 5rem;">パスワード再設定メールを送る</h2>
        <form action="/user/reset_send" method="post">
            @csrf
            <div class="user_title" style="margin-top:1rem;">メールアドレス</div>
            <input type="text" name="email" class="user_mail_input form-control" style="margin-bottom:0;margin-top:0;" placeholder="info@paircode.work" autocomplete="off">
            <div class="error_mail_form" style="height: 27px;text-align:left;margin: 0 20%;">
                <span class="user_mail_error" style="display:none;color: #dc3545;">メールを入力してください</span>
            </div>
            <div class="flex_btn" style="margin-top: 2.5rem;">
                <input class="btn btn-outline-dark edit_detail_top_btn" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-outline-info reset_btn" type="submit" value="送信">
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
@parent
<script>
    $(document).on('click', '.reset_btn', function() {

        var error = 0;

        if ($('.user_mail_input')[0].value == '') {
            $('.user_mail_input').css("border-color", "#dc3545");
            $('.user_mail_error').fadeIn();
            error++;
        }
        if (0 < error) {
            return false;
        }

    });

    // 必須チェック解除
    $(document).ready(function() {

        $('.user_mail_input').change(function() {
            var str = $(this).value;
            if (str != '') {
                $('.user_mail_input')[0].css("border-color", "#ced4da");
                $('.user_mail_error').fadeOut();
            }
        });
    });
</script>
@endsection