@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="row">
    <div class="col-8 offset-2 center">
        <h2>3人のユーザーに「いいね」を送ってみましょう</h2>
        <div class="match_top">
            @foreach ($users as $user)
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
                    <input type="hidden" class="match_user_id" value="{{$user->id}}">
                    <input type="hidden" class="match_user_name" value="{{$user->name}}">
                    <input type="hidden" class="match_user_address" value="{{$user->address}}">
                    <input type="hidden" class="match_user_occupation" value="{{$user->occupation}}">
                    <input type="hidden" class="match_user_skill" value="{{$user->skill}}">
                    <input type="hidden" class="match_user_licence" value="{{$user->licence}}">
                    <input type="hidden" class="match_user_workhistory" value="{{$user->workhistory}}">
                    <input type="hidden" class="click_flg" value>
                    <img src="{{$user->image}}" class="match_user_img" style="display:none;">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('footer')
@parent
@endsection