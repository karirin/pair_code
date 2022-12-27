<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/match.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="height: auto;">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('header')
    @if (Auth::check())

    @if(request()->path()!='privacy_poricy' && request()->path()!='terms_of_service' && request()->path()!='user/edit_detail')
    <div style="position: fixed;">
        <ul>
            <li class="top_link">
                <a sytle="margin: -0.5rem 0 0 -1.2rem;" href="{{ asset('top') }}" class="top_link_header_login">Pair
                    Code</a>
            </li>
            <div class="header_sub">
                <li class="top_link prof_page"><a class="prof_modal" href="#"><img src="{{asset($current_user->image)}}" class="user_image"></a></li>
                <li class="header_menu_wide" style="margin-top: 4rem;"><a href="{{ asset('top') }}" class="sagasu" style="vertical-align: middle;"><i class="fa-solid fa-magnifying-glass" style="margin-right: 2rem;font-size: 1.5rem;"></i>さがす　　　</a>
                </li>
                <li class="header_menu"><a href="{{ asset('match/match') }}" class="oaitekara" style="vertical-align: middle;">
                        @if($match_flg!='')<i class="fas fa-thumbs-up" style="font-size: 1.5rem;"></i><i class="fa-solid fa-circle new_match_mark" style="font-size: 1px;color: red;top: 43%;position: absolute;"></i><span style="margin-left: 2rem">お相手から　<span>@else<i class="fas fa-thumbs-up" style="margin-right: 2rem;font-size: 1.5rem;"></i></span>お相手から　@endif
                    </a></li>
                <li class="header_menu"><a href="{{ asset('message/message_top') }}" class="messe-ji" style="vertical-align: middle;">
                        @if($message_count!=0)<i class="fas fa-comment" style="font-size: 1.5rem;"></i><i class="fa-solid fa-circle new_mark" style="font-size: 1px;color: red;top: 57%;position: absolute;"></i><span style="margin-left: 2rem">メッセージ　</span>@else<i class="fas fa-comment" style="margin-right: 2rem;font-size: 1.5rem;"></i><i class="fa-solid fa-circle new_mark" style="display: none;font-size: 1px;color: red;top: 57%;position: absolute;"></i><span>メッセージ　</span>@endif
                    </a></li>
                <li class="header_menu"><a href="{{ asset('user/profile') }}" class="profile" style="vertical-align: middle;"><i class="fa-regular fa-circle-user" style="font-size: 1.5rem;"></i><span style="margin-left: 2rem">プロフィール</spna>
                    </a></li>
                <li class="header_menu_wide" class="roguauto" style="vertical-align: middle;"><a href="{{ asset('user/logout') }}" style="vertical-align: middle;"><i class="fas fa-sign-out-alt" style="margin-right: 2rem;font-size: 1.5rem;"></i>ログアウト　</a>
                </li>
            </div>
            @else
            <div>
                <ul>
                    <li class="top_link">
                        <a sytle="margin: -0.5rem 0 0 -1.2rem;" href="{{ asset('top') }}" class="top_link_header_login">Pair
                            Cod</a>
                    </li>
                    @endif


                </ul>
            </div>

            <div class="smartphone_header">
                <div style="width: 100%;height:100%;background-color: #fdff8b0a;">
                    <span style="display:inline-block;">
                        <a href="{{ asset('top') }}" class="sagasu" style="color: #9f9f9f;"><i class="fa-solid fa-magnifying-glass"></i>
                            <div style="text-align: center;font-size:1.5rem;">さがす</div>
                        </a>
                    </span><span style="display:inline-block;">
                        <a href="{{ asset('match/match') }}" class="oaitekara" style="color: #9f9f9f;"><i class="fas fa-thumbs-up"></i></a>
                        <div style="text-align: center;font-size:1.5rem;">お相手か</div>
                    </span><span style="display:inline-block;">
                        <a href="{{ asset('message/message_top') }}" class="messe-ji" style="color: #9f9f9f;"><i class="fas fa-comment"></i></a>
                        <div style="text-align: center;font-size:1.5rem;">メッセージ</div>
                    </span><span style="display:inline-block;">
                        <a href="{{ asset('user/profile') }}" class="profile" style="color: #9f9f9f;"><i class="fa-regular fa-circle-user"></i></a>
                        <div style="text-align: center;font-size:1.5rem;">プロフィール</div>
                    </span><span style="display:inline-block;">
                        <a href="{{ asset('user/logout') }}" style="color: #9f9f9f;"><i class="fas fa-sign-out-alt"></i></a>
                        <div style="text-align: center;font-size:1.5rem;">ログアウト</div>
                    </span>
                </div>
            </div>
            @else


            <nav class="navbar navbar-dark">
                <ul class="main_ul">
                    <li class="top_link" style="margin: 0 auto 0 0;">
                        <a sytle="margin: -0.5rem 0 0 -1.2rem;" href="{{ asset('top') }}" class="top_link_header">Pair
                            Cod</a>
                    </li>
                    <li class="header" style="margin: 0;"><a href="{{ asset('user/login') }}" style="vertical-align: middle;"><i class="fas fa-sign-in-alt" style="margin-right: 0.5rem;"></i>ログイン</a></li>
                    <li class="header" style="margin: 0;"><a href="{{ asset('user/add') }}" style="vertical-align: middle;"><i class="fas fa-user-plus" style="margin-right: 0.5rem;"></i>新規登録</a></li>
                </ul>
            </nav>
            @endif


            @show
            @yield('profile')
            <div class="content">
                @yield('content')
            </div>


            @section('footer')
            <div class="modal_match"></div>
            <div class="modal_top"></div>
            <div class="matchuser_detaile">
                <i class="far fa-times-circle" style="display:inline;"></i>
                <img class="matchuser_img">
                <div style="padding: 1rem;">
                    <div class="matchuser_name"></div>
                    <span class="matchuser_age"></span>
                    <span class="matchuser_address"></span>
                    <span class="matchuser_occupation"></span>
                    <div class="matchuser_profile"></div>
                    <div style="text-align:right;">
                        <a href="#" class="match_good_btn" id="match_good_btn"><i class="fas fa-thumbs-up"></i>いいね</a>
                        <a href="#" class="good_btn" id="good_btn" style="display: none;"><i class="fas fa-thumbs-up"></i>いいね</a>
                        <input type="hidden" class="user_id">
                        <input type="hidden" class="matchs_flg">
                    </div>
                </div>
            </div>
            <div class="matchuser_detaile_prof">
                <div style="padding: 1rem;">
                    <h6>スキル</h6>
                    <div class="matchuser_skill"></div>
                    <h6 style="margin-top: 1rem;">資格</h6>
                    <span class="matchuser_licence"></span>
                    <h6 style="margin-top: 1rem;">職歴</h6>
                    <span class="matchuser_workhistory"></span>
                </div>
            </div>


            @if (Auth::check())
            <div class="modal_prof"></div>
            <div class="slide_prof">
                <a class="prof_close" href="#">
                    <p><i class="fas fa-angle-right"></i></p>
                </a>
                <form method="post" action="{{ asset('user/edit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="current_name" value="{{$current_user->name}}">
                    <input type="hidden" name="current_age" value="{{$current_user->age}}">
                    <input type="hidden" name="current_occupation" value="{{$current_user->occupation}}">
                    <input type="hidden" name="current_address" value="{{$current_user->address}}">
                    <input type="hidden" name="current_skill" value="{{$current_user->skill}}">
                    <input type="hidden" name="current_licence" value="{{$current_user->licence}}">
                    <input type="hidden" name="current_workhistory" value="{{$current_user->workhistory}}">
                    <div class="profile">
                        <div class="edit_profile_img">
                            <label>
                                <div class="fa-image_range">
                                    <i class="far fa-image"></i>
                                </div>
                                <input type="file" name="image_name" id="edit_profile_img_narrower" accept="image/*" multiple>
                            </label>
                            <img name="profile_image" class="editing_profile_img" src="{{asset($current_user->image)}}">
                            <label>
                                <i class="far fa-times-circle profile_clear"></i>
                                <input type="button" id="profile_clear">
                            </label>
                        </div>
                        <img src="{{asset($current_user->image)}}" class="mypage">
                        <h3 class="profile_name_narrow">{{$current_user->name}}</h3>
                        <input type="hidden" name="id" class="user_id" value="{{$current_user->id}}">
                        <input type="file" name="image" class="image" value="{{asset($current_user->image)}}" style="display:none;">
                        <div class="tag">
                            <div class="age">
                                <p class="tag_tittle">年齢</p>
                                <div class="user_age">{{$current_user->age}}歳</div>
                            </div>
                            <div class="occupation">
                                <p class="tag_tittle" style="display: inline-block;">職種</p>
                                <div class="user_occupation">{{$current_user->occupation}}</div>
                            </div>
                            <div class="address">
                                <p class="tag_tittle" style="display: inline-block;">住所</p>
                                <div class="user_address">{{$current_user->address}}</div>
                            </div>
                            <div class="tags">
                                <div class="tag_skill">
                                    <p class="tag_tittle">スキル</p>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($skills as $skill)@if($skill!='' )
                                    @if (3 <= $i)<span id="child-span_narrow" class="skill_tag extra" style="display: none;">
                                        {{$skill}}</span>
                                        @else
                                        <span id="child-span_narrow" class="skill_tag">{{$skill}}</span>
                                        @endif
                                        @php
                                        $i++
                                        @endphp
                                        @endif
                                        @endforeach
                                        <i class="fas fa-plus skill_btn_narrow"></i>
                                </div>
                                <div class="tag_licence">
                                    <p class="tag_tittle">取得資格</p>
                                    @php
                                    $j = 0;
                                    @endphp
                                    @foreach ($licences as $licence)
                                    @if($licence!='')
                                    @if (3 <= $j) <span id="child-span_narrow" class="licence_tag extra" style="display: none;">
                                        {{$licence}}</span>
                                        @else
                                        <span id="child-span_narrow" class="licence_tag">{{$licence}}</span>
                                        @endif
                                        @endif
                                        @php
                                        $j++
                                        @endphp
                                        @endforeach
                                        <i class="fas fa-plus licence_btn_narrow"></i>
                                </div>
                            </div>
                            <div class="background">
                                <p class="tag_tittle">職歴</p>
                                <p class="user_workhistory">{{$current_user->workhistory}}</p>
                            </div>
                        </div>
                        <div class="myprofile_btn">
                            <button class="btn btn btn-outline-dark profile_edit_btn" type="button" name="follow">プロフィール編集</button>
                        </div>
                    </div>
                    <div class="form" style="margin:0;text-align:left;">
                        <div class="user_age">
                            <p class="tag_tittle">年齢</p>
                            <div class="age_narrow">{{$current_user->age}}</div>歳
                        </div>
                        <div class="user_occupation">
                            <p class="tag_tittle" style="display: inline-block;">職種</p>
                            <div class="occupation_narrow">{{$current_user->occupation}}</div>
                        </div>
                        <div class="user_address">
                            <p class="tag_tittle" style="display: inline-block;">住所</p>
                            <div class="address_narrow">{{$current_user->address}}</div>
                        </div>
                        <p class="tag_tittle" style="text-align:left;">スキル</p>
                        <div id="skill_narrow">
                            @php
                            $k = 0;
                            @endphp
                            @foreach ($skills as $skill)
                            @if($skill!='')
                            @if (3 <= $k) <span id="child-span_narrow" class="skill_tag extra" style="display: none;">
                                {$skill}}<label><input type="button" style="display:none;"><i class="far  fa-times-circle skill_narrow"></i></label></span>@else<span id="child-span_narrow" class="skill_tag">{{$skill}}<label><input type="button" style="display:none;"><i class="far  fa-times-circle skill_narrow"></i></label></span>
                                @endif
                                @endif
                                @php
                                $k++
                                @endphp
                                @endforeach
                                <i class="fas fa-plus skill_btn_narrow"></i>
                        </div>
                        <input placeholder="skill Stack" name="skills" id="skill_input_narrow" />
                        <input type="hidden" name="skills" id="skills_narrow">
                        <input type="hidden" name="skill_count" id="skill_count_narrow">
                        <input type="hidden" name="myskills" value="{{$current_user->skill}}">
                        <div id="licence">
                            <p class="tag_tittle">取得資格</p>
                            <div id="licence_narrow">
                                @php
                                $l = 0;
                                @endphp
                                @foreach ($licences as $licence)
                                @if($licence!='')
                                @if (3 <= $l) <span id="child-span_narrow" class="licence_tag extra" style="display: none;">
                                    {{$licence}}<label><input type="button" style="display:none;"><i class="far fa-times-circle licence"></i></label></span>
                                    @else
                                    <span id="child-span_narrow" class="licence_tag">{{$licence}}<label><input type="button" style="display:none;"><i class="far fa-times-circle licence"></i></label></span>
                                    @endif
                                    @endif
                                    @php
                                    $l++
                                    @endphp
                                    @endforeach
                            </div>
                            <i class="fas fa-plus licence_btn_narrow"></i>
                        </div>
                        <input placeholder="licence Stack" name="name" id="licence_input_narrow" />
                        <input type="hidden" name="licences" id="licences_narrow">
                        <input type="hidden" name="licence_count" id="licence_count_narrow">
                        <input type="hidden" name="mylicences" value="{{$current_user->licence}}">
                        <div class="background">
                            <p class="tag_tittle">職歴</p>
                            <p class="workhistory_narrow">{{$current_user->workhistory}}</p>
                            <div class="error_workhistory" style="display: none;">
                                <span style="color:rgb(220, 53, 69);">100文字以内で入力してください</span>
                            </div>
                        </div>
                        <div class="btn_flex">
                            <button class="btn btn-outline-info profile_close" type="button">閉じる</button>
                            <button class="btn btn-outline-dark profile_narrow_close" type="button" style="width: 100%;">閉じる</button>
                            <input type="submit" class="btn btn-outline-dark edit_done" value="編集完了">
                        </div>
                    </div>
            </div>
            </form>
    </div>
    @endif


    <p class="match_message">
    </p>
    <div class="footer">
        <a href="https://forms.gle/eLx24ykodQaRKqiV9">お問い合わせ</a> / <a href="{{ asset('privacy_poricy') }}">プライバシーポリシー</a> / <a href="{{ asset('terms_of_service') }}">利用規約</a> /
        <a href="https://twitter.com/ryoya3948">Twitter</a> / <span style="color: white;">© 2022 Pair Code.</span>
    </div>
    <script src=" https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <script src="{{ asset('/js/match.js') }}"></script>
    @show
</body>

</html>