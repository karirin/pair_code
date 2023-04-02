@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div style="margin: 0 26%;display: flex;" class="mail_finish">
    <div>
        <h2 style="margin-top: 5rem;margin-bottom:2rem;">パスワード再設定メールを送信しました</h2>
        <div class="mail_detail" style="text-align:left;margin-bottom:1rem;font-size:1.3rem;">以下のメールアドレスへパスワード再設定メールを送信しました。</div>
        <div class="mail_detail_email" style="padding: 1rem;background-color:rgb(226 225 225 / 50%);text-align:left;">
            <h5 class="mail_detail_email_disp" style="margin-bottom: 0;">{{$email}}</h5>
        </div>
        <div style="text-align:right;margin-top: 2rem;"><a href="{{ asset('/') }}" class="btn btn-outline-dark">
                <h4 class="mail_detail_btn" style="margin-bottom: 0;">トップ画面へ</h4>
            </a></div>
    </div>
</div>
@endsection
@section('footer')
@parent
@endsection