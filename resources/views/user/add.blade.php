@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col-6 offset-3 center user_add_top">
        <h2 style="margin-top: 2rem;">新規登録</h2>
        <form method="post" action="{{ asset('user/add') }}" enctype="multipart/form-data" class="user_add_form" style="display: none;">
            @csrf
            <div class="user_title">ユーザー名</div>
            <input type="text" name="name" class="user_name_input form-control" placeholder="ニックネーム" autocomplete="off">
            <div class="error_name_form" style="height: 27px;text-align:left;margin: 0 20%;">
                <span class="user_name_error" style="display:none;color: #dc3545;">ユーザー名を入力してください</span>
            </div>
            <div class="user_title">メールアドレス</div>
            <input type="text" name="email" class="user_mail_input form-control" style="margin-bottom:0;" placeholder="info@paircode.work" autocomplete="off">
            <div class="error_mail_form" style="height: 27px;text-align:left;margin: 0 20%;">
                <span class="user_mail_error" style="display:none;color: #dc3545;">メールを入力してください</span>
            </div>
            <div class="user_title">パスワード</div>
            <input type="password" name="password" class="user_pass_input form-control" style="margin-bottom:0;" autocomplete="off">
            <div class="password_sub" style="display:inline-block;width: 60%;text-align:left;font-size:0.9rem;">
                ※英数字8文字以上
            </div>
            <div class="error_pass_form" style="height: 27px;text-align:left;margin: 0 20%;">
                <span class="user_pass_error" style="display:none;color: #dc3545;">パスワードを入力してください</span>
            </div>
            <div class="prof_image" style="width:60%;display:inline-block;text-align:left;">
                <div class="image_select">プロフィール画像</div>
                <div class="post_btn" style="justify-content: unset;">
                    <label>
                        <i class="far fa-image"></i>
                        <input type="file" name="image" id="my_image" style="display:none;">
                    </label>
                </div>
                <div class="image_size" style="font-size:0.9rem;">※（縦横200px×200px以上推奨、5MB未満）</div>
            </div>
            <div class="error_img_form" style="height: 27px;text-align:left;margin: 0 20%;">
                <span class="user_img_error" style="display:none;color: #dc3545;">画像を選択してください</span>
            </div>
            <p class="preview_img"><img class="my_preview"></p>
            <input type="button" id="my_clear" value="ファイルをクリアする">
            <div style="text-align: right;margin: 0 20%;margin-top: 1rem">
                <a class="sns_btn" style="color:#007bff;">
                    <span>SNSで登録する方はこちら</span>
                </a>
            </div>
            <div class="flex_btn margin_top" style="margin-bottom: 2rem;">
                <input class="btn btn-outline-dark" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-outline-info submit_btn" type="submit" value="登録">
            </div>
        </form>
        <div class="social_btn">
            <h4 class="social_tittle">SNSアカウントで登録</h4>
            <div style="margin-top: 1rem;">
                <a href="/auth/twitter" class="btn-social-long-twitter">
                    <i class="fa-brands fa-twitter edit_detail_top_btn" style="margin-right: 1rem;vertical-align:bottom;font-size: 25px;"></i><span class="twitter_login">Twitterで新規登録</span>
                </a>
            </div>
            <div>
                <a href="/auth/redirect" class="btn-social-long-google">
                    <img src="/storage/top/google.png" style="width:1.5rem;margin-right: 1rem;" class="google_mark"><span class="google_login" style="color:#727272;">Googleで新規登録</span>
                </a>
            </div>
            <div>
                <a href="/linelogin" class="btn-social-long-line">
                    <img src="/storage/top/line.png" style="width:1.5rem;margin-right: 1rem;" class="line_mark"><span class="line_login" style="color:#fff;vertical-align: bottom;">LINEで新規登録　</span>
                </a>
            </div>
            <div style="text-align: right;margin: 0 20%;margin-top: 2rem">
                <a class=" mail_address" style="color:#007bff;">
                    <span>メールアドレスで登録する方はこちら</span>
                </a>
            </div>
        </div>
    </div>
</div>
<p class="add_message">{{$add_message}}</p>
@endsection
@section('footer')
@parent
<script>
    $(document).on('click', '.mail_address', function() {
        $('.social_btn').hide();
        $('.user_add_form').fadeIn();
        $('html, body').scrollTop(0);
    });
    $(document).on('click', '.sns_btn', function() {
        $('.social_btn').fadeIn();
        $('.user_add_form').hide();
    });
</script>
@endsection