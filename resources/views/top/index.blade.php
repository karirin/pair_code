@extends('layouts.top')

@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
@if (Auth::check())
<div class="col-9 match_top" style="margin-left: 22%;">
    <h3 class="page_title">さがす</h3>
    @foreach ($users as $user)
    @if ($user->id != $current_user->id)
    @if ($user->check_match($user->id,$current_user->id) === 0)
    <div class="match_user" data-target="#matchuser_{{$user->id}}" data-toggle="matchuser">
        <div id="matchuser_{{$user->id}}">
            <img class="match_user_img" src="{{asset($user->image)}}">
            <div class="match_user_profile">
                <div>
                    <span class="match_user_occupation">{{$user->occupation}}</span>
                    <span class="match_user_age">{{$user->age}}歳</span>
                </div>
                <span class="match_user_prof">{{$user->profile}}</span>
            </div>
            <input type="hidden" class="match_flg" value="{{$user->check_match($user->id,$current_user->id)}}">
            <input type="hidden" class="matchs_flg" value="{{$user->check_matchs($user->id,$current_user->id)}}">
            <input type="hidden" class="match_user_id" value="{{$user->id}}">
            <input type="hidden" class="match_user_name" value="{{$user->name}}">
            <input type="hidden" class="match_user_address" value="{{$user->address}}">
            <input type="hidden" class="match_user_occupation" value="{{$user->occupation}}">
            <input type="hidden" class="match_user_skill" value="{{$user->skill}}">
            <input type="hidden" class="match_user_licence" value="{{$user->licence}}">
            <input type="hidden" class="match_user_workhistory" value="{{$user->workhistory}}">
            <img src="{{$user->image}}" class="match_user_img" style="display:none;">
        </div>
    </div>
    @endif
    @endif
    @endforeach
</div>
<p class="top_message">{{$top_message}}</p>
@else
<div class="description">
    <span>
        Test Appは自分のサービスをユーザーに<br>テストしてもらうサービスです。<br>
        他ユーザーのサービスをテストすることもできます。
    </span>
</div>
<form method="post" action="{{ asset('user/test_login') }}">
    @csrf
    <div class="test_btn">
        <input type="hidden" name="name" class="user_name_input" value="test_user">
        <input type="hidden" name="password" class="user_pass_input" value="karirin3948">
        <input class="test_login btn btn-outline-dark" type="submit" name="test_login" value="おためしログイン">
    </div>
</form>
</div>
@endif
@endsection
@section('footer')
@parent
@endsection
</div>