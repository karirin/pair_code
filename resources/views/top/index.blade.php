@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
@if (Auth::check())
<div id="splash"></div>
<div class="col-9 match_top sarch_top" style="margin-left: 23%;padding-left: 3rem;display:none;">
    <h3 class="page_title serach">さがす</h3>
    <i class="fa-solid fa-circle-question help_btn"></i>
    <input type="hidden" class="sample_user">
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
                <input type="hidden" class="match_user_prof" value="{{$user->profile}}">
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
            <input type="hidden" class="click_flg" value>
            <input type="hidden" class="flg" value="{{$current_user->top_flg}}">
            <img src="{{$user->image}}" class="match_user_img" style="display:none;">
        </div>
    </div>
    @endif
    @endif
    @endforeach
</div>
<div class="modal_help"></div>
<i class="fa-solid fa-arrow-pointer pointer" id="pointer" style="display: none;"></i>
<i class="fa-solid fa-arrow-pointer pointer2" id="pointer2" style="display: none;"></i>
<i class="fa-regular fa-circle-xmark help_close1" style="display: none;"></i>
<i class="fa-regular fa-circle-xmark help_close2" style="display: none;"></i>
<div class="help_message" style="display:none;">
    <span class="help-title">いいねの流れ</span>
    気になるエンジニアをクリック
</div>
<div class="help_message2" style="display:none;">
    <span class="help-title">いいねの流れ</span>
    「いいね」ボタンをクリックします
</div>
<p class="top_message">{{$top_message}}</p>
@else
<div id="splash" style="bottom: 54%;left: 50%;"></div>
<!-- ここから非ログインユーザーのトップ画面 -->
<div class="maintop_page" style="display: none;">
    <image src="storage/top/remote-team.png" class="top_image" style="width:43%;height: auto;margin-left: 3rem;">
        <image src="storage/top/haikei.png" class="haikei" style="height: auto;">
            <image src="../storage/top/top logo.png" class="top_logo">
                <a href="{{ asset('user/add') }}" class="user_login_btn btn btn-secondary" style="vertical-align: middle;">新規登録</a>
                <a href="{{ asset('user/login') }}" class="user_add_btn btn btn-outline-dark" style="vertical-align: middle;">ログイン</a>
                <form method="post" action="{{ asset('user/test_login') }}">
                    @csrf
                    <div class="test_btn">
                        <input type="hidden" name="name" class="user_name_input" value="test_user">
                        <input type="hidden" name="password" class="user_pass_input" value="karirin3948">
                        <input style="" class="test_login btn btn-outline-dark" type="submit" name="test_login" value="おためしログイン">
                    </div>
                </form>
                <div style="text-align: center;">
                    <div class="description">こんなお悩みありませんか。。？</div>
                    <div class="worries" style="vertical-align: top;">
                        <div style="text-align: center;">
                            <image class="howtouse_firstimage" src="storage/top/undraw_feeling_proud_qne1.png" style="width:55%;height: auto;">
                        </div>
                        <h4 style="font-weight: 900;height:4rem;">職場以外のエンジニアと接する機会が無い</h4>
                        <div class="howtouse_content engineer_sarch" style="font-size:1.2rem;">勉強会やセミナーに参加してエンジニアとつながりたい<br>でもそこまで労力をかけたくない。。</div>
                    </div>
                    <div class="worries" style="vertical-align: top;">
                        <div style="text-align: center;">
                            <image class="howtouse_firstimage" src="storage/top/undraw_Interview_re_e5jn.png" style="width:67%;height: auto;">
                        </div>
                        <h4 style="font-weight: 900;height:4rem;">独学でしているプログラミングの相談がしたい</h4>
                        <div class="howtouse_content engineer_sarch" style="font-size:1.2rem;">勉強しているプログラミングの質問をしたい<br>周りに知り合いのエンジニアがいればできるのに。。</div>
                    </div>
                    <div class="worries">
                        <div style="text-align: center;">
                            <image class="howtouse_firstimage" src="storage/top/undraw_Programming_re_kg9v.png" style="width:92%;height: auto;">
                        </div>
                        <h4 style="font-weight: 900;height:4rem;">同じスキルを持っているエンジニアとつながりたい</h4>
                        <div class="howtouse_content engineer_sarch" style="font-size:1.2rem;">同じスキルを持っている人はどういう活躍をしているのか知りたい<br>職場以外でどうすれば見つけられるだろう。。</div>
                    </div>
                    <image class="howtouse_firstimage" src="storage/top/bottom.png" style="width:33%;height: auto;margin-top: 2rem;">
                        <div>
                            <image src="storage/top/Explanation.png" class="explanation" style="height: auto;width: 81%;margin-left: 2rem;">
                        </div>
                </div>
                <div class="description_top" style="text-align: center;">
                    <div class="description">サービス概要</div>
                    <image src="storage/top/undraw_Engineering_team_a7n2.png" style="width:40%;height: auto;">
                        <div class="description_concept" style="font-size: 1.4rem;line-height: 2;">
                            エンジニア同士で交流することができる「Pair Code」</br>

                            スキルや経歴が気になるエンジニアとつながりにいきましょう</br>

                            マッチングすればメッセージなどでやりとりすることができます
                        </div>
                </div>
                <div style="text-align: center;margin: 3rem 0;">
                    <div class="description">簡単な４つのステップでマッチング</div>
                    <div style="font-size: 1.3rem;line-height: 2;display: flex;flex-wrap: wrap;justify-content: center;">
                        <div class="howtouse">
                            <div style="text-align: center;">
                                <image class="howtouse_firstimage" src="storage/top/undraw_People_search_re_5rre.png" style="width:55%;height: auto;">
                            </div>
                            <h3>1．エンジニアをさがす</h3>
                            <div class="howtouse_content engineer_sarch" style="font-size:1.2rem;">トップ画面から登録しているエンジニアを閲覧することができます</div>
                        </div>

                        <div class="howtouse good_engineer">
                            <div style="text-align: center;">
                                <image class="howtouse_firstimage" src="storage/top/undraw_Spread_love_re_v3cl.png" style="width:83%;height: auto;">
                            </div>
                            <h3>2．気になるエンジニアにいいね</h3>
                            <div class="howtouse_content" style="font-size:1.2rem;">ユーザー詳細画面から「いいね」をクリックすると、相手に「いいね」を送ることができます</div>
                        </div>

                        <div class="howtouse">
                            <div style="text-align: center;">
                                <image class="howtouse_firstimage" src="storage/top/undraw_couple_love_re_3fw6.png" style="width:58.5%;height: auto;">
                            </div>
                            <h3>3．マッチング</h3>
                            <div class="howtouse_content matching" style="font-size:1.2rem;">「いいね」が送られた方は、もらったいいね画面から「いいね」を送りマッチングすることができます</div>
                        </div>

                        <div class="howtouse">
                            <div style="text-align: center;">
                                <image class="howtouse_firstimage" src="storage/top/undraw_Chat_re_re1u.png" style="width:50%;height: auto;">
                            </div>
                            <h3>4．メッセージ</h3>
                            <div class="howtouse_content" style="font-size:1.2rem;">マッチングした相手とはメッセージのやり取りで交流することができます</div>
                        </div>
                    </div>
                </div>
</div>
@endif
@endsection
@section('footer')
@parent
<script>
    if ($('.flg').val() == '') {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: 'POST',
            url: '/ajax_flg',
            dataType: 'text'
        }).done(function() {
            setTimeout(function() {
                $('.match_user:first').hide();
                $('.sample_user').replaceWith('<div class="sample_user" id="sample_user" data-target="#matchuser_0" data-toggle="matchuser"><div id="matchuser_0"><img class="match_user_img" src="/storage/user/sample_user.png"><div class="match_user_profile"><div><span class="match_user_occupation">システムエンジニア</span><span class="match_user_age">24歳</span></div><span class="match_user_prof"></span></div><input type="hidden" class="match_flg" value="0"><input type="hidden" class="matchs_flg" value="0"><input type="hidden" class="match_user_id" value="0"><input type="hidden" class="match_user_name" value="サンプルユーザー"><input type="hidden" class="match_user_address" value="東京都"><input type="hidden" class="match_user_occupation" value="システムエンジニア"><input type="hidden" class="match_user_skill" value="PHP Laravel AWS"><input type="hidden" class="match_user_licence" value="ITパスポート 基本情報技術者"><input type="hidden" class="match_user_workhistory" value="テスト"><input type="hidden" class="click_flg" value><img src="storage/user/sample_user.png" class="match_user_img" style="display:none;"></div></div>');
                $('.modal_help').fadeIn();
                $('#pointer').addClass('pointer');
                $('.pointer').fadeIn();
                $('.help_message').fadeIn();
                $('.help_close1').fadeIn();
                $('#sample_user').css({
                    'z-index': '15',
                    'position': 'relative'
                });
                if ($(window).width() <= 980) {
                    setInterval(function() {
                        $('.pointer').animate({
                            'left': '33%',
                            'top': '23%'
                        });
                        $('.pointer').fadeOut();
                        $('.pointer').animate({
                            'left': '26%',
                            'top': '27%'
                        });
                        $('.pointer').fadeIn();
                    }, 1000);
                } else {
                    setInterval(function() {
                        $('.pointer').animate({
                            'left': '34%',
                            'top': '30%'
                        });
                        $('.pointer').fadeOut();
                        $('.pointer').animate({
                            'left': '30%',
                            'top': '40%'
                        });
                        $('.pointer').fadeIn();
                    }, 1000);
                }
                // ユーザー詳細画面
                $(document).on('click', "#sample_user", function() {
                    var $target_modal = $(this).data("target");
                    $('.modal_match').hide();
                    $('.fa-times-circle').hide();
                    $('.help_close2').fadeIn();
                    $('.help_close1').fadeOut();
                    $('.matchuser_detaile').fadeIn();
                    $('.matchuser_detaile_prof').fadeIn();
                    $('.matchuser_detaile .matchuser_img').attr('src', $($target_modal + ' > .match_user_img')[0].getAttribute('src'));
                    $('.matchuser_detaile .matchuser_name').replaceWith('<div class="matchuser_name">' + $($target_modal + ' > .match_user_name')[0].value + '</div>');
                    $('.matchuser_detaile .matchuser_age').replaceWith('<span class="matchuser_age">' + $($target_modal + ' > .match_user_profile > div > .match_user_age').text() + '</span>');
                    $('.matchuser_detaile .matchuser_address').replaceWith('<span class="matchuser_address">' + $($target_modal + ' > .match_user_address')[0].value + '</span>');
                    $('.matchuser_detaile .matchuser_profile').replaceWith('<div class="matchuser_profile">' + $($target_modal + ' > .match_user_profile > .match_user_prof').text() + '</div>');
                    $('.matchuser_detaile .matchuser_occupation').replaceWith('<span class="matchuser_occupation">' + $($target_modal + ' > .match_user_occupation')[0].value + '</span>');
                    $('.matchuser_detaile_prof .matchuser_skill').replaceWith('<span id="child-span_myprofile" class="matchuser_skill" style="font-size: 1rem;">' + $($target_modal + ' > .match_user_skill')[0].value + '</span>');
                    $('.matchuser_detaile_prof .matchuser_licence').replaceWith('<span id="child-span_myprofile" class="matchuser_licence" style="font-size: 1rem;">' + $($target_modal + '  > .match_user_licence')[0].value + '</span>');
                    $('.matchuser_detaile_prof .matchuser_workhistory').replaceWith('<span class="matchuser_workhistory" style="font-size: 1rem;">' + $($target_modal + ' > .match_user_workhistory')[0].value + '</span>');
                    $('.matchuser_detaile .user_id').val($($target_modal + ' > .match_user_id')[0].value);
                    $('.matchuser_detaile .matchs_flg').val($($target_modal + ' > .matchs_flg')[0].value);
                    $('.matchuser_detaile_prof').fadeIn();
                    if ($($target_modal + ' > .click_flg')[0].value != 0) {
                        $('.match_good_btn').hide();
                    } else {
                        $('.match_good_btn').show();
                    }
                    $('.match_user:first').css({
                        'z-index': '0',
                        'position': 'unset'
                    });
                    $('.matchuser_detaile').css({
                        'z-index': '25'
                    });
                    $('#pointer2').css({
                        'z-index': '30'
                    });
                    $('.help_message').fadeOut();
                    $('.help_message2').fadeIn();
                    $('.pointer').fadeOut();
                    $('#pointer2').addClass('pointer2');
                    $('.pointer2').fadeIn();
                    if ($(window).width() <= 980) {
                        setInterval(function() {
                            $('.pointer2').animate({
                                'left': '74%',
                                'top': '65%'
                            });
                            $('.pointer2').fadeOut();
                            $('.pointer2').animate({
                                'left': '65%',
                                'top': '69%'
                            });
                            $('.pointer2').fadeIn();
                        }, 1000);
                    } else {
                        setInterval(function() {
                            $('.pointer2').animate({
                                'left': '44%',
                                'top': '71%'
                            });
                            $('.pointer2').fadeOut();
                            $('.pointer2').animate({
                                'left': '38%',
                                'top': '80%'
                            });
                            $('.pointer2').fadeIn();
                        }, 1000);
                    }
                    $(document).on('click', ".match_good_btn", function() {
                        $('#pointer2').removeClass('pointer2');
                        $('#pointer2').fadeOut();
                    });
                });
                $(document).on('click', ".help_close1", function() {
                    $('.content').css('position', 'unset');
                    $('.matchuser_detaile').fadeOut();
                    $('.matchuser_detaile_prof').fadeOut();
                    $('.help_message').fadeOut();
                    $('.help_message2').fadeOut();
                    $('.modal_help').fadeOut();
                    $('#pointer').removeClass('pointer');
                    $('#pointer').fadeOut();
                    $('#pointer2').removeClass('pointer2');
                    $('#pointer2').fadeOut();
                    $('.help_close1').fadeOut();
                    $('#sample_user').replaceWith('<input type="hidden" class="sample_user">');
                    $('.match_user:first').fadeIn();
                });
                $(document).on('click', ".help_close2", function() {
                    $('.content').css('position', 'unset');
                    $('.matchuser_detaile').fadeOut();
                    $('.matchuser_detaile_prof').fadeOut();
                    $('.help_message').fadeOut();
                    $('.help_message2').fadeOut();
                    $('.modal_help').fadeOut();
                    $('#pointer').removeClass('pointer');
                    $('#pointer').fadeOut();
                    $('#pointer2').removeClass('pointer2');
                    $('#pointer2').fadeOut();
                    $('.help_close2').fadeOut();
                    $('#sample_user').replaceWith('<input type="hidden" class="sample_user">');
                    $('.match_user:first').fadeIn();
                });
            }, 840);
        }).fail(function() {});
    }

    setTimeout(function() {
        $(".match_top").css("display", "inline-block");
        $(".maintop_page").css("display", "inline-block");
    }, 840);

    // ヘルプボタンクリック時
    $(document).on('click', '.help_btn', function() {
        $('.match_user:first').hide();
        $('.sample_user').replaceWith('<div class="sample_user" id="sample_user" data-target="#matchuser_0" data-toggle="matchuser"><div id="matchuser_0"><img class="match_user_img" src="/storage/user/sample_user.png"><div class="match_user_profile"><div><span class="match_user_occupation">システムエンジニア</span><span class="match_user_age">24歳</span></div><span class="match_user_prof"></span></div><input type="hidden" class="match_flg" value="0"><input type="hidden" class="matchs_flg" value="0"><input type="hidden" class="match_user_id" value="0"><input type="hidden" class="match_user_name" value="サンプルユーザー"><input type="hidden" class="match_user_address" value="東京都"><input type="hidden" class="match_user_occupation" value="システムエンジニア"><input type="hidden" class="match_user_skill" value="PHP Laravel AWS"><input type="hidden" class="match_user_licence" value="ITパスポート 基本情報技術者"><input type="hidden" class="match_user_workhistory" value="テスト"><input type="hidden" class="click_flg" value><img src="storage/user/sample_user.png" class="match_user_img" style="display:none;"></div></div>');
        $('.modal_help').fadeIn();
        $('#pointer').addClass('pointer');
        $('.pointer').fadeIn();
        $('.help_message').fadeIn();
        $('.help_close1').fadeIn();
        $('#sample_user').css({
            'z-index': '15',
            'position': 'relative'
        });
        if ($(window).width() <= 980) {
            setInterval(function() {
                $('.pointer').animate({
                    'left': '29%',
                    'top': '23%'
                });
                $('.pointer').fadeOut();
                $('.pointer').animate({
                    'left': '20%',
                    'top': '25%'
                });
                $('.pointer').fadeIn();
            }, 1000);
        } else {
            setInterval(function() {
                $('.pointer').animate({
                    'left': '34%',
                    'top': '30%'
                });
                $('.pointer').fadeOut();
                $('.pointer').animate({
                    'left': '30%',
                    'top': '40%'
                });
                $('.pointer').fadeIn();
            }, 1000);
        }
        // ユーザー詳細画面
        $(document).on('click', "#sample_user", function() {
            var $target_modal = $(this).data("target");
            $('.modal_match').hide();
            $('.fa-times-circle').hide();
            $('.help_close1').fadeOut();
            $('.help_close2').fadeIn();
            $('.matchuser_detaile').fadeIn();
            $('.matchuser_detaile_prof').fadeIn();
            $('.matchuser_detaile_prof').attr('class', 'matchuser_detaile_prof_sample');
            $('.matchuser_detaile .matchuser_img').attr('src', $($target_modal + ' > .match_user_img')[0].getAttribute('src'));
            $('.matchuser_detaile .matchuser_name').replaceWith('<div class="matchuser_name">' + $($target_modal + ' > .match_user_name')[0].value + '</div>');
            $('.matchuser_detaile .matchuser_age').replaceWith('<span class="matchuser_age">' + $($target_modal + ' > .match_user_profile > div > .match_user_age').text() + '</span>');
            $('.matchuser_detaile .matchuser_address').replaceWith('<span class="matchuser_address">' + $($target_modal + ' > .match_user_address')[0].value + '</span>');
            $('.matchuser_detaile .matchuser_profile').replaceWith('<div class="matchuser_profile">' + $($target_modal + ' > .match_user_profile > .match_user_prof').text() + '</div>');
            $('.matchuser_detaile .matchuser_occupation').replaceWith('<span class="matchuser_occupation">' + $($target_modal + ' > .match_user_occupation')[0].value + '</span>');
            $('.matchuser_detaile_prof .matchuser_skill').replaceWith('<span id="child-span_myprofile" class="matchuser_skill" style="font-size: 1rem;">' + $($target_modal + ' > .match_user_skill')[0].value + '</span>');
            $('.matchuser_detaile_prof .matchuser_licence').replaceWith('<span id="child-span_myprofile" class="matchuser_licence" style="font-size: 1rem;">' + $($target_modal + '  > .match_user_licence')[0].value + '</span>');
            $('.matchuser_detaile_prof .matchuser_workhistory').replaceWith('<span class="matchuser_workhistory" style="font-size: 1rem;">' + $($target_modal + ' > .match_user_workhistory')[0].value + '</span>');
            $('.matchuser_detaile .user_id').val($($target_modal + ' > .match_user_id')[0].value);
            $('.matchuser_detaile .matchs_flg').val($($target_modal + ' > .matchs_flg')[0].value);
            $('.matchuser_detaile_prof').fadeIn();
            if ($($target_modal + ' > .click_flg')[0].value != 0) {
                $('.match_good_btn').hide();
            } else {
                $('.match_good_btn').show();
            }
            $('.match_user:first').css({
                'z-index': '0',
                'position': 'unset'
            });
            $('.matchuser_detaile').css({
                'z-index': '25'
            });
            $('#pointer2').css({
                'z-index': '30'
            });
            $('.help_message').fadeOut();
            $('.help_message2').fadeIn();
            $('.pointer').fadeOut();
            $('#pointer2').addClass('pointer2');
            $('.pointer2').fadeIn();
            if ($(window).width() <= 980) {
                setInterval(function() {
                    $('.pointer2').animate({
                        'left': '74%',
                        'top': '65%'
                    });
                    $('.pointer2').fadeOut();
                    $('.pointer2').animate({
                        'left': '65%',
                        'top': '69%'
                    });
                    $('.pointer2').fadeIn();
                }, 1000);
            } else {
                setInterval(function() {
                    $('.pointer2').animate({
                        'left': '44%',
                        'top': '71%'
                    });
                    $('.pointer2').fadeOut();
                    $('.pointer2').animate({
                        'left': '38%',
                        'top': '80%'
                    });
                    $('.pointer2').fadeIn();
                }, 1000);
            }
            $(document).on('click', ".match_good_btn", function() {
                $('#pointer2').removeClass('pointer2');
                $('#pointer2').fadeOut();
            });
        });
        $(document).on('click', ".help_close1", function() {
            $('.matchuser_detaile').fadeOut();
            $('.matchuser_detaile_prof').fadeOut();
            $('.matchuser_detaile_prof_sample').fadeOut();
            $('.help_message').fadeOut();
            $('.help_message2').fadeOut();
            $('.modal_help').fadeOut();
            $('#pointer').removeClass('pointer');
            $('#pointer').fadeOut();
            $('#pointer2').removeClass('pointer2');
            $('#pointer2').fadeOut();
            $('.content').css('position', 'unset');
            $('.help_close1').fadeOut();
            $('#sample_user').replaceWith('<input type="hidden" class="sample_user">');
            $('.match_user:first').fadeIn();
            $('.matchuser_detaile_prof_sample').attr('class', 'matchuser_detaile_prof');
        });
        $(document).on('click', ".help_close2", function() {
            $('.matchuser_detaile').fadeOut();
            $('.matchuser_detaile_prof').fadeOut();
            $('.matchuser_detaile_prof_sample').fadeOut();
            $('.help_message').fadeOut();
            $('.help_message2').fadeOut();
            $('.modal_help').fadeOut();
            $('#pointer').removeClass('pointer');
            $('#pointer').fadeOut();
            $('#pointer2').removeClass('pointer2');
            $('#pointer2').fadeOut();
            $('.content').css('position', 'unset');
            $('.help_close2').fadeOut();
            $('#sample_user').replaceWith('<input type="hidden" class="sample_user">');
            $('.match_user:first').fadeIn();
            $('.matchuser_detaile_prof_sample').attr('class', 'matchuser_detaile_prof');
        });
    });
</script>
@endsection
</div>