@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
@foreach ($users as $user)
<div style="width: 100%;height: 100%;">
    <div class="card" id="match{{$user->id}}">
        <label>
            <i class="far fa-times-circle profile_clear"></i>
            <input type="button" id="profile_clear">
        </label>
        <img src="{{asset($user->image)}}" class="mypage">
        <h3 class="profile_name">{{$user->name}}</h3>
        <p class="comment">{{$user->profile}}</p>
        <div class="matching_btn">
            <label>
                <div class="fa-image_range">
                    <i class="fas fa-times-circle"></i>
                </div>
                <input type="button" id="unmatch_btn" data-target="#match{{$user->id}}" style="display:none;">
                <input type="hidden" class="unmatch_user_id" value="{{$current_user->id}}">
            </label>
            <label>
                <div class="fa-image_range">
                    <i class="fas fa-heart"></i>
                </div>
                <input type="button" id="match_btn" data-target="#match{{$user->id}}" style="display:none">
                <input type="hidden" id="match{{$user->id}}_userid" value="{{$user->id}}>">
                <input type="hidden" class="match_user_id" value="{{$current_user->id}}">
            </label>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('footer')
@parent
@endsection