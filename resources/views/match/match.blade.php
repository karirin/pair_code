@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="col-9.5 match_top" style="margin-left: 22%;display: inline-block;">
    <div id="splash">
        <div style="background-color: #fdff8b0a;width: 100%;height: 100%;">
            <div id="splash_logo">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!--画像部分は適宜差し換えてください-->
            <!--/splash-->
        </div>
    </div>
    <h3 class="page_title">お相手から</h3>
    @foreach ($users as $user)
    @if($user_class->check_match($current_user->id,$user->id))
    @if($user_class->check_unmatch($current_user->id,$user->id)==0)
    @if($user_class->check_matchs($current_user->id,$user->id)!=2)
    <div id="match{{$user->id}}" class="match_card card match_user" data-target="#matchuser_{{$user->id}}" data-toggle="matchuser" style="display: flex;">
        <span class="match_card_color" style="display:none;">
            <i class="fa-regular fa-thumbs-up" style="margin:40% 0;font-size: 3rem;">
                <div style="font-size: 1.8rem;font-weight:900;margin-top: 0.5rem;">いいかもしました</div>
            </i>
        </span>
        <span class="unmatch_card_color" style="display:none;">
            <i class="fa-solid fa-reply" style="margin:40% 0;font-size: 3rem;">
                <div style="font-size: 1.8rem;font-weight:900;margin-top: 0.5rem;">スキップしました</div>
            </i>
        </span>
        <span class="back_card_color" style="background:linear-gradient(rgb(0 0 0 / 0%) 0, #000 2000px);">

        </span>
        <div id="matchuser_{{$user->id}}">
            <input type="hidden" class="match_flg" value="{{$user->check_match($user->id,$current_user->id)}}">
            <input type="hidden" class="matchs_flg" value="{{$user->check_matchs($user->id,$current_user->id)}}">
            <input type="hidden" class="match_user_id" value="{{$user->id}}">
            <input type="hidden" class="match_user_name" value="{{$user->name}}">
            <input type="hidden" class="match_user_address" value="{{$user->address}}">
            <input type="hidden" class="match_user_occupation" value="{{$user->occupation}}">
            <input type="hidden" class="match_user_skill" value="{{$user->skill}}">
            <input type="hidden" class="match_user_licence" value="{{$user->licence}}">
            <input type="hidden" class="match_user_workhistory" value="{{$user->workhistory}}">
            <div class="match_user_profile" style="display: none;">
                <div>
                    <span class="match_user_age">{{$user->age}}歳</span>
                </div>
            </div>
            <input type="hidden" class="click_flg" value="0">
            <img src=" {{asset($user->image)}}" class="match_user_img" style="width: 100%;height: 100%;border-radius: 8px;">
            <label>
                <i class="far fa-times-circle profile_clear"></i>
                <input type="button" id="profile_clear">
            </label>
            <h3 class="profile_name" style="color: #fff;">{{$user->name}}</h3>
            <input type="hidden" class="unmatch_user_id" value="{{$current_user->id}}">
            <input type="hidden" id="match{{$user->id}}_userid" value="{{$user->id}}">
            <input type="hidden" class="match_user_id" value="{{$current_user->id}}">
        </div>
    </div>
    @endif
    @endif
    @endif
    @endforeach
    <div class="matching_btn">
        <label>
            <div class="fa-image_range fa" style="margin-right: 8rem;">
                <i class="fa-solid fa-reply" style="font-size: 25px;"></i>
            </div>
            <input type="button" id="unmatch_btn" style="display:none;">
        </label>
        <label>
            <div class="fa-image_range fa">
                <i class="fas fa-thumbs-up" style="font-size: 25px;"></i>
            </div>
            <input type="button" id="match_btn" style="display:none">
        </label>
    </div>
    @endsection
    @section('footer')
    @parent
    @endsection