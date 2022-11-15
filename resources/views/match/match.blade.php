@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
@foreach ($users as $user)
<div id="match{{$user->id}}" class="match_card card">
    <img src="{{asset($user->image)}}">
    <label>
        <i class="far fa-times-circle profile_clear"></i>
        <input type="button" id="profile_clear">
    </label>
    <h3 class="profile_name">{{$user->name}}</h3>
    <p class="comment">{{$user->profile}}</p>
    <input type="hidden" class="unmatch_user_id" value="{{$current_user->id}}">
    <input type="hidden" id="match{{$user->id}}_userid" value="{{$user->id}}">
    <input type="hidden" class="match_user_id" value="{{$current_user->id}}">
</div>
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