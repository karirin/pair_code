@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="col-9.5 match_top" style="margin-left: 22%;">
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
    <div id="match{{$user->id}}" class="match_card card">
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
        <img src=" {{asset($user->image)}}">
        <label>
            <i class="far fa-times-circle profile_clear"></i>
            <input type="button" id="profile_clear">
        </label>
        <h3 class="profile_name">{{$user->name}}</h3>
        <input type="hidden" class="unmatch_user_id" value="{{$current_user->id}}">
        <input type="hidden" id="match{{$user->id}}_userid" value="{{$user->id}}">
        <input type="hidden" class="match_user_id" value="{{$current_user->id}}">
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