@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="col-9.5 match_top" style="margin-left: 22%;">
    <h3 class="page_title">お相手から</h3>
    @foreach ($users as $user)
    @if($user_class->check_match($current_user->id,$user->id))
    @if($user_class->check_unmatch($current_user->id,$user->id)==0)
    @if($user_class->check_matchs($current_user->id,$user->id)!=2)
    <div id="match{{$user->id}}" class="match_card card">
        <span class="match_card_color" style="display:none;">
            <i class="fa-regular fa-thumbs-up" style="margin:30% 0;font-size: 5rem;">
                <div style="font-size: 2rem;font-weight:900;">いいかもしました</div>
            </i>
        </span>
        <span class="unmatch_card_color" style="display:none;">
            <i class="fa-solid fa-reply" style="margin:30% 0;font-size: 5rem;">
                <div style="font-size: 2rem;font-weight:900;">スキップしました</div>
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