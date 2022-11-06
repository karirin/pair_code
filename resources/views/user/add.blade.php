@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col-6 offset-3 center">
        <h2>新規登録</h2>
        <form method="post" action="{{ asset('user/add') }}" enctype="multipart/form-data">
            @csrf
            <div class="user_title">ユーザー名</div>
            <input type="text" name="name" class="user_name_input form-control" placeholder="ニックネーム">
            <div class="user_title">パスワード</div>
            <input type="password" name="password" class="user_pass_input form-control" style="margin-bottom:0;">
            <div style="display:inline-block;width: 60%;margin-bottom: 1rem;text-align:left;font-size:0.9rem;">
                ※英数字8文字以上
            </div>
            <div style="width:60%;display:inline-block;text-align:left;">
                <div class="image_select">プロフィール画像を選んでください。</div>
                <div class="post_btn" style="justify-content: unset;">
                    <label>
                        <i class="far fa-image"></i>
                        <input type="file" name="image" style="display:none;">
                    </label>
                </div>
                <div style="font-size:0.9rem;">※（縦横200px×200px以上推奨、5MB未満）</div>
            </div>
            <p class="preview_img"><img class="my_preview"></p>
            <input type="button" id="my_clear" value="ファイルをクリアする">

            <div class="flex_btn margin_top">
                <input class="btn btn-outline-info" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-outline-dark" type="submit" value="登録">
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
@parent
@endsection