@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col-6 offset-3 center user_add_top">
        <h2 style="margin-top: 2rem;">新規登録</h2>
        <form method="post" action="{{ asset('user/add') }}" enctype="multipart/form-data">
            @csrf
            <div class="user_title">ユーザー名</div>
            <input type="text" name="name" class="user_name_input form-control" placeholder="ニックネーム">
            <div style="height: 27px;text-align:left;margin: 0 20%;">
                <span class="user_name_error" style="display:none;color: #dc3545;">ユーザー名を入力してください</span>
            </div>
            <div class="user_title">パスワード</div>
            <input type="password" name="password" class="user_pass_input form-control" style="margin-bottom:0;">
            <div class="password_sub" style="display:inline-block;width: 60%;text-align:left;font-size:0.9rem;">
                ※英数字8文字以上
            </div>
            <div style="height: 27px;text-align:left;margin: 0 20%;">
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
            <p class="preview_img"><img class="my_preview"></p>
            <input type="button" id="my_clear" value="ファイルをクリアする">

            <div class="flex_btn margin_top">
                <input class="btn btn-outline-info" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-outline-dark submit_btn" type="submit" value="次へ">
            </div>
        </form>
    </div>
</div>
<p class="add_message">{{$add_message}}</p>
@endsection
@section('footer')
@parent
@endsection