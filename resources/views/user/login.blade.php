@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col-6 offset-3 center">
        <h2>ログイン</h2>
        <form action="/user/login" method="post">
            @csrf
            <div class="user_title">ユーザー名</div>
            <input type="text" name="name" class="user_name_input form-control">
            <div class="user_title">パスワード</div>
            <input type="password" name="password" class="user_pass_input form-control">
            <div class="flex_btn margin_top">
                <input class="btn btn-outline-info" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-outline-dark" type="submit" value="ログイン">
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
@parent
@endsection