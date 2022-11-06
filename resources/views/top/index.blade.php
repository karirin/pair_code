@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
@if (Auth::check())
<form method="post" action="{{ asset('user/edit') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-3">
            <div style="margin-top: 1.5rem;margin-left:0.5rem;">
                <div style="text-align: center;">
                    <div class="edit_profile_img">
                        <label>
                            <div class="fa-image_range">
                                <i class="far fa-image"></i>
                            </div>
                            <input type="file" name="image_name" id="edit_profile_img" accept="image/*" multiple>
                        </label>
                        <img class="editing_profile_img" src="{{asset($current_user->getData_image())}}"
                            name="profile_image">
                        <label>
                            <i class="far fa-times-circle profile_clear"></i>
                            <input type="button" id="profile_clear">
                        </label>
                    </div>
                    <img src="{{asset($current_user->getData_image())}}" class="mypage">
                    <h3 class="profile_name">{{$current_user->getData_name()}}</h3>
                    <input type="hidden" class="current_user_id" value="{{$current_user->getData_id()}}">
                    <input type="hidden" value="{{$current_user->getData_id()}}">
                </div>
            </div>

            <div class="tag">
                <div class="age">
                    <p class="tag_tittle">年齢</p>
                    <div class="user_age">{{$current_user->getData_age()}}歳</div>
                </div>
                <div class="occupation">
                    <p class="tag_tittle" style="display: inline-block;">職種</p>
                    <div class="user_occupation">{{$current_user->getData_occupation()}}</div>
                </div>
                <div class="address">
                    <p class="tag_tittle" style="display: inline-block;">住所</p>
                    <div class="user_address">{{$current_user->getData_address()}}</div>
                </div>
                <div class="tags">
                    <div class="tag_skill">
                        <p class="tag_tittle">スキル</p>
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($skills as $skill)
                        @if (3 <= $i) <span id="child-span_myprofile" class="skill_tag extra" style="display: none;">
                            {{$skill}}</span>
                            @else
                            <span id="child-span_myprofile" class="skill_tag">{{$skill}}</span>
                            @endif
                            @php
                            $i++
                            @endphp
                            @endforeach
                            <i class="fas fa-plus skill_btn"></i>
                    </div>
                    <div class="tag_licence">
                        <p class="tag_tittle">取得資格</p>
                        @php
                        $j = 0;
                        @endphp
                        @foreach ($licences as $licence)
                        @if (3 <= $j) <span id="child-span" class="licence_tag extra" style="display: none;">
                            {{$licence}}</span>
                            @else
                            <span id="child-span" class="licence_tag">{{$licence}}</span>
                            @endif
                            @php
                            $j++
                            @endphp
                            @endforeach
                            <i class="fas fa-plus licence_btn"></i>
                    </div>
                </div>
                <div class="background">
                    <p class="tag_tittle">職歴</p>
                    <p class="user_workhistory">{{$current_user->getData_workhistory()}}</p>
                </div>
            </div>
            <div class="myprofile_btn">
                <?php //if ($current_user['id'] == $_SESSION['user_id']) : 
                ?>
                <button class="btn btn btn-outline-dark profile_edit_btn" type="button" name="follow">プロフィール編集</button>
                <?php //endif; 
                ?>
            </div>
            <div class="form">
                <div class="user_age">
                    <p class="tag_tittle">年齢</p>
                    <div class="age">{{$current_user->getData_age()}}</div>歳
                </div>
                <div class="user_occupation">
                    <p class="tag_tittle" style="display: inline-block;">職種</p>
                    <div class="occupation">{{$current_user->getData_occupation()}}</div>
                </div>
                <div class="user_address">
                    <p class="tag_tittle" style="display: inline-block;">住所</p>
                    <div class="address">{{$current_user->getData_address()}}</div>
                </div>
                <p class="tag_tittle">スキル</p>
                <div id="myprofile_skill">
                    @php
                    $k = 0;
                    @endphp
                    @foreach ($skills as $skill)
                    @if (3 <= $k) <span id="child-span_myprofile" class="skill_tag extra" style="display: none;">
                        {{$skill}}<label><input type="button" style="display:none;"><i
                                class="far  fa-times-circle skill_myprofile"></i></label></span>
                        @else
                        <span id="child-span_myprofile" class="skill_tag">{{$skill}}<label><input type="button"
                                    style="display:none;"><i class="far  fa-times-circle skill_myprofile"></i></label>
                        </span>
                        @endif
                        @php
                        $k++
                        @endphp
                        @endforeach
                        <i class="fas fa-plus myprofile_skill_btn"></i>
                </div>
                <input placeholder="skill Stack" name="skills" id="skill_myprofile_input" />
                <input type="hidden" name="skills" id="myprofile_skills">
                <input type="hidden" name="skill_count" id="myprofile_skill_count">
                <input type="hidden" name="myskills" value="{{$current_user->getData_skill()}}">
                <div id="licence">
                    <p class="tag_tittle">取得資格</p>
                    @php
                    $l = 0;
                    @endphp
                    @foreach ($licences as $licence)
                    @if (3 <= $l) <span id="child-span" class="licence_tag extra" style="display: none;">
                        {{$licence}}<label><input type="button" style="display:none;"><i
                                class="far fa-times-circle licence"></i></label></span>
                        @else
                        <span id="child-span" class="licence_tag">{{$licence}}<label><input type="button"
                                    style="display:none;"><i class="far fa-times-circle licence"></i></label></span>
                        @endif
                        @php
                        $l++
                        @endphp
                        @endforeach
                        <i class="fas fa-plus myprofile_licence_btn"></i>
                </div>
                <input placeholder="licence Stack" name="name" id="licence_input" />
                <input type="hidden" name="licences" id="licences">
                <input type="hidden" name="licence_count" id="licence_count">
                <input type="hidden" name="mylicences" value="{{$current_user->getData_licence()}}">
                <div class="background">
                    <p class="tag_tittle">職歴</p>
                    <p class="workhistory">{{$current_user->getData_workhistory()}}</p>
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

        <div class="col-9 match_top">
            @foreach ($users as $user)
            <!-- // if ($user['id'] != $current_user['id']) :
    // if (check_match($user['id'], $current_user['id'])['count(*)'] == 0) :
    //     $match_flg = check_match($user['id'], $_SESSION['user_id']);
    //     $matchs_flg = check_matchs($user['id'], $_SESSION['user_id']); -->
            <div class="match_user" data-target="#matchuser_{{$user->getData_id()}}" data-toggle="matchuser">
                <div id="matchuser_{{$user->getData_id()}}">
                    <img class="match_user_img" src="{{asset($user->getData_image())}}">
                    <div class="match_user_profile">
                        <div>
                            <span class="match_user_occupation">{{$user->getData_occupation()}}</span>
                            <span class="match_user_age">{{$user->getData_age()}}歳</span>
                        </div>
                        <span class="match_user_prof">{{$user->getData_profile()}}</span>
                    </div>
                    <!-- <input type="hidden" class="match_flg" value=" $match_flg['count(*)']; ?>">
            <input type="hidden" class="matchs_flg" value=" $matchs_flg[0]['count(*)']; ?>"> -->
                    <input type="hidden" class="match_user_id" value="{{$user->getData_id()}}">
                    <input type="hidden" class="match_user_name" value="{{$user->getData_name()}}>">
                    <input type="hidden" class="match_user_address" value="{{$user->getData_address()}}">
                    <input type="hidden" class="match_user_occupation" value="{{$user->getData_occupation()}}">
                    <img src="{{$user->getData_image()}}" class="match_user_img" style="display:none;">
                </div>
            </div>
            @endforeach
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