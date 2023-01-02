@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="container">
    <span class="choose">Choose Gender</span>

    <div class="dropdown">
        <div class="select">
            <span>Select Gender</span>
            <i class="fa fa-chevron-left"></i>
        </div>
        <input type="hidden" name="gender">
        <ul class="dropdown-menu">
            <li id="male">ネットワークエンジニア</li>
            <li id="female">Webエンジニア</li>
            <li id="female">フロントエンドエンジニア</li>
            <li id="female">インフラエンジニア</li>
            <li id="female">サーバーエンジニア</li>
            <li id="female">データベースエンジニア</li>
            <li id="female">IoTエンジニア</li>
            <li id="female">制御・組み込みエンジニア</li>
            <li id="female">テストエンジニア</li>
            <li id="female">その他</li>
        </ul>
    </div>

    <span class="msg"></span>
</div>
<style>
    * {
        outline: 0;
        font-family: sans-serif
    }

    body {
        background-color: #fafafa
    }

    span.msg,
    span.choose {
        color: #555;
        padding: 5px 0 10px;
        display: inherit
    }

    .container {
        width: 500px;
        margin: 50px auto 0;
        text-align: center
    }

    /*Styling Selectbox*/
    .dropdown {
        width: 300px;
        display: inline-block;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 0 2px rgb(204, 204, 204);
        transition: all .5s ease;
        position: relative;
        font-size: 14px;
        color: #474747;
        height: 100%;
        text-align: left
    }

    .dropdown .select {
        cursor: pointer;
        display: block;
        padding: 10px
    }

    .dropdown .select>i {
        font-size: 13px;
        color: #888;
        cursor: pointer;
        transition: all .3s ease-in-out;
        float: right;
        line-height: 20px
    }

    .dropdown:hover {
        box-shadow: 0 0 4px rgb(204, 204, 204)
    }

    .dropdown:active {
        background-color: #f8f8f8
    }

    .dropdown.active:hover,
    .dropdown.active {
        box-shadow: 0 0 4px rgb(204, 204, 204);
        border-radius: 2px 2px 0 0;
        background-color: #f8f8f8
    }

    .dropdown.active .select>i {
        transform: rotate(-90deg)
    }

    .dropdown .dropdown-menu {
        position: absolute;
        background-color: #fff;
        width: 100%;
        left: 0;
        margin-top: 1px;
        box-shadow: 0 1px 2px rgb(204, 204, 204);
        border-radius: 0 1px 2px 2px;
        overflow: hidden;
        display: none;
        max-height: 144px;
        overflow-y: auto;
        z-index: 9
    }

    .dropdown .dropdown-menu li {
        padding: 10px;
        transition: all .2s ease-in-out;
        cursor: pointer
    }

    .dropdown .dropdown-menu {
        padding: 0;
        list-style: none
    }

    .dropdown .dropdown-menu li:hover {
        background-color: #f2f2f2
    }

    .dropdown .dropdown-menu li:active {
        background-color: #e2e2e2
    }
</style>

<form method="post" action="{{ asset('user/edit') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="current_name" value="{{$current_user->name}}">
    <input type="hidden" name="current_age" value="{{$current_user->age}}">
    <input type="hidden" name="current_occupation" value="{{$current_user->occupation}}">
    <input type="hidden" name="current_address" value="{{$current_user->address}}">
    <input type="hidden" name="current_skill" value="{{$current_user->skill}}">
    <input type="hidden" name="current_licence" value="{{$current_user->licence}}">
    <input type="hidden" name="current_workhistory" value="{{$current_user->workhistory}}">
    <div id="splash">Loading...</div>
    <div class="profile_top" style="margin-left: 20%;width:70%;display: none;">
        <h3 class="page_title profile_title">プロフィール</h3>
        <div class="tag" style="display: block;">
            <div class="row profile_top">
                <div class="col-3">
                    <img src="{{asset($current_user->image)}}" class="mypage" style="margin-top: 1rem;">
                    <h3 class="profile_name_prof">{{$current_user->name}}</h3>
                    <input type="hidden" class="current_user_id" value="{{$current_user->id}}">
                    <input type="hidden" value="{{$current_user->id}}">
                    <div class="age" style="margin-bottom: 1rem;">
                        <p class="tag_tittle">年齢</p>
                        <div class="user_age">{{$current_user->age}}歳</div>
                    </div>
                    <div class="address" style="margin-bottom: 1rem;">
                        <p class="tag_tittle" style="display: inline-block;">住所</p>
                        <div class="user_address">{{$current_user->address}}</div>
                    </div>
                    <div class="occupation" style="margin-bottom: 1rem;">
                        <p class="tag_tittle" style="display: inline-block;">職種</p>
                        <div class="user_occupation">{{$current_user->occupation}}</div>
                    </div>
                </div>
                <div class="col-8" style="margin-top: 1rem;margin-left: 1rem;">
                    <div class="tags" style="width: 60%;">
                        <div class="tag_skill" style="margin-bottom: 1rem;">
                            <p class="tag_tittle" style="margin-top: 0;">スキル</p>
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($skills as $skill)@if($skill!='')
                            @if (3 <= $i) <span id="child-span_myprofile" class="skill_tag extra" style="display: none;">
                                {{$skill}}</span>
                                @else
                                <span id="child-span_myprofile" class="skill_tag">{{$skill}}</span>
                                @endif
                                @php
                                $i++
                                @endphp
                                @endif
                                @endforeach
                                <i class="fas fa-plus skill_btn"></i>
                        </div>
                        <div class="tag_licence" style="margin-bottom: 1rem;">
                            <p class="tag_tittle">取得資格</p>
                            @php
                            $j = 0;
                            @endphp
                            @foreach ($licences as $licence)
                            @if($licence!='')
                            @if (3 <= $j) <span id="child-span" class="licence_tag extra" style="display: none;">
                                {{$licence}}</span>
                                @else
                                <span id="child-span" class="licence_tag">{{$licence}}</span>
                                @endif
                                @php
                                $j++
                                @endphp
                                @endif
                                @endforeach
                                <i class="fas fa-plus licence_btn"></i>
                        </div>
                    </div>
                    <div class="profile" style="margin-bottom: 1rem;">
                        <p class="tag_tittle">自己紹介</p>
                        <p class="user_profile" style="width: 70%;">{{$current_user->profile}}</p>
                    </div>
                    <div class="background" style="margin-bottom: 1rem;">
                        <p class="tag_tittle">職歴</p>
                        <p class="user_workhistory" style="width: 70%;">{{$current_user->workhistory}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="myprofile_btn" style="position: fixed;bottom: 15%;right: 0%;width:100%;">
            <button class="btn btn btn-outline-dark profile_edit_btn" type="button" name="follow">プロフィール編集</button>
        </div>
        <div class="form" style="width: 100%;">
            <div class="row">
                <div class="col-4">
                    <div class="edit_profile_img">
                        <label style="position: absolute;z-index: 10;top: 10%;left: 19%;">
                            <div class="fa-image_range">
                                <i class="far fa-image"></i>
                            </div>
                            <input type="file" name="image_name" id="edit_profile_img" accept="image/*" multiple>
                        </label>
                        <img class="editing_profile_img" src="{{asset($current_user->image)}}" name="profile_image">
                        <label>
                            <i class="far fa-times-circle profile_clear"></i>
                            <input type="button" id="profile_clear">
                        </label>
                    </div>
                    <h3 class="profile_name">{{$current_user->name}}</h3>
                    <div class="user_age">
                        <p class="tag_tittle" style="margin-top: 0.5rem;">年齢</p>
                        <div class="age">{{$current_user->age}}</div>歳
                    </div>
                    <div class="user_address">
                        <p class="tag_tittle" style="display: inline-block;">住所</p>
                        <div class="address">{{$current_user->address}}</div>
                    </div>
                    <div class="user_occupation">
                        <p class="tag_tittle" style="display: inline-block;">職種</p>
                        <div class="occupation">{{$current_user->occupation}}</div>
                    </div>
                </div>
                <div class="col-8">
                    <p class="tag_tittle">スキル</p>
                    <div id="myprofile_skill" style="width: 60%;">
                        @php
                        $k = 0;
                        @endphp
                        @foreach($skills as $skill)@if($skill!='')@if(3 <= $k)<span id="child-span_myprofile" class="skill_tag extra" style="display: none;">
                            {{$skill}}<label><input type="button" style="display:none;"><i class="far  fa-times-circle skill_myprofile"></i></label></span>
                            @else<span id="child-span_myprofile" class="skill_tag">{{$skill}}<label><input type="button" style="display:none;"><i class="far  fa-times-circle skill_myprofile"></i></label></span>
                            @endif
                            @endif
                            @php
                            $k++
                            @endphp
                            @endforeach<i class="fas fa-plus myprofile_skill_btn"></i>
                    </div>
                    <input placeholder="skill Stack" name="skills" id="skill_myprofile_input" style="display:block;" />
                    <input type="hidden" name="myprofile_skills" id="myprofile_skills">
                    <input type="hidden" name="skill_count" id="myprofile_skill_count">
                    <input type="hidden" name="myskills" value="{{$current_user->skill}}">
                    <p class="tag_tittle">取得資格</p>
                    <div id="licence" style="width: 60%;">
                        @php
                        $l = 0;
                        @endphp
                        @foreach ($licences as $licence)@if($licence!='')@if(3 <= $l)<span id="child-span" class="licence_tag extra" style="display: none;">{{$licence}}<label><input type="button" style="display:none;"><i class="far fa-times-circle licence"></i></label></span>@else
                            <span id="child-span" class="licence_tag">{{$licence}}<label><input type="button" style="display:none;"><i class="far fa-times-circle licence"></i></label></span>
                            @endif
                            @endif
                            @php
                            $l++
                            @endphp
                            @endforeach<i class="fas fa-plus myprofile_licence_btn"></i>
                    </div>
                    <input placeholder="licence Stack" name="name" id="licence_input" />
                    <input type="hidden" name="myprofile_licences" id="myprofile_licences">
                    <input type="hidden" name="licence_count" id="licence_count">
                    <input type="hidden" name="mylicences" value="{{$current_user->licence}}">
                    <div class="background">
                        <p class="tag_tittle">自己紹介</p>
                        <p class="edit_profile">{{$current_user->workhistory}}</p>
                    </div>
                    <div class="background">
                        <p class="tag_tittle">職歴</p>
                        <p class="workhistory">{{$current_user->workhistory}}</p>
                        <div class="error_workhistory" style="display: none;">
                            <span style="color:rgb(220, 53, 69);">100文字以内で入力してください</span>
                        </div>
                    </div>
                    <div class="edit_btns">
                        <input type="submit" class="btn btn-outline-dark edit_done" value="編集完了">
                        <button class="btn btn-outline-dark profile_close" type="button">閉じる</button>
                        <button class="btn btn-outline-dark profile_narrow_close" type="button">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('footer')
@parent
<script>
    setTimeout(function() {
        $(".profile_top").css("display", "inline-block");
    }, 840);

    /*Dropdown Menu*/
    $('.dropdown').click(function() {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu').slideToggle(300);
    });
    $('.dropdown').focusout(function() {
        $(this).removeClass('active');
        $(this).find('.dropdown-menu').slideUp(300);
    });
    $('.dropdown .dropdown-menu li').click(function() {
        $(this).parents('.dropdown').find('span').text($(this).text());
        $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
    });
    /*End Dropdown Menu*/


    $('.dropdown-menu li').click(function() {
        var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
            msg = '<span class="msg">Hidden input value: ';
        $('.msg').html(msg + input + '</span>');
    });
</script>
@endsection