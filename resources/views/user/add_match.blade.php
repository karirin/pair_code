@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
aaa
@endsection
@section('footer')
@parent
<i class="fa-solid fa-arrow-pointer pointer" id="pointer" style="display: none;"></i>
<i class="fa-solid fa-arrow-pointer pointer2" id="pointer2" style="display: none;"></i>
<script>
    window.onload = function() {
        $("#splash").delay(100).fadeOut('slow'); //ローディング画面を1.5秒（1500ms）待機してからフェードアウト
        $("#splash_logo").delay(100).fadeOut('slow'); //ロゴを1.2秒（1200ms）待機してからフェードアウト
        $("#splash-logo").delay(1200).fadeOut('slow'); //ロゴを1.2秒でフェードアウトする記述
        setTimeout(function() {
            $(".match_top").css("display", "inline-block");
        }, 840);

        $('.top_link_header_login').attr("href", "#");
        setTimeout(function() {
            $('.match_user:first').hide();
            $('.sample_user').replaceWith('<div class="sample_user" id="sample_user" data-target="#matchuser_0" data-toggle="matchuser"><div id="matchuser_0"><img class="match_user_img" src="/storage/user/sample_user.png"><div class="match_user_profile"><div><span class="match_user_occupation">システムエンジニア</span><span class="match_user_age">24歳</span></div><input type="hidden" class="mactch_user_prof" value="テスト"></div><input type="hidden" class="match_flg" value="0"><input type="hidden" class="matchs_flg" value="0"><input type="hidden" class="match_user_id" value="0"><input type="hidden" class="match_user_name" value="サンプルユーザー"><input type="hidden" class="match_user_address" value="東京都"><input type="hidden" class="match_user_occupation" value="システムエンジニア"><input type="hidden" class="match_user_skill" value="PHP Laravel AWS"><input type="hidden" class="match_user_licence" value="ITパスポート 基本情報技術者"><input type="hidden" class="match_user_workhistory" value="テスト"><input type="hidden" class="click_flg" value><img src="storage/user/sample_user.png" class="match_user_img" style="display:none;"></div></div>');
            $('.modal_help').fadeIn();
            $('#pointer').addClass('pointer');
            $('.pointer').fadeIn();
            $('.help_message').fadeIn();
            $('.help_close').fadeIn();
            $('#sample_user').css({
                'z-index': '15',
                'position': 'relative'
            });
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
            // ユーザー詳細画面
            $(document).on('click', "#sample_user", function() {
                var $target_modal = $(this).data("target");
                $('.modal_match').hide();
                $('.fa-times-circle').hide();
                $('.help_close').fadeIn();
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
                $('.match_good_btn').hide();
                $('.good_btn').show();
                $('.matchuser_detaile').css({
                    'z-index': '25'
                });
                $('#pointer2').css({
                    'z-index': '30'
                });
                $('.match_user:first').css({
                    'z-index': '0',
                    'position': 'unset'
                });
                $('.help_message').fadeOut();
                $('.help_message2').fadeIn();
                $('.pointer').fadeOut();
                $('#pointer2').addClass('pointer2');
                $('.pointer2').fadeIn();
                setInterval(function() {
                    $('.pointer2').animate({
                        'left': '45%',
                        'top': '73%'
                    });
                    $('.pointer2').fadeOut();
                    $('.pointer2').animate({
                        'left': '38%',
                        'top': '80%'
                    });
                    $('.pointer2').fadeIn();
                }, 1000);
                $(document).on('click', ".match_good_btn", function() {
                    $('#pointer2').removeClass('pointer2');
                    $('#pointer2').fadeOut();
                });
            });
            $(document).on('click', ".help_close", function() {
                $('.matchuser_detaile').fadeOut();
                $('.matchuser_detaile_prof').fadeOut();
                $('.help_message').fadeOut();
                $('.help_message2').fadeOut();
                $('.modal_help').fadeOut();
                $('#pointer').removeClass('pointer');
                $('#pointer').fadeOut();
                $('#pointer').stop(true, true);
                $('#pointer2').removeClass('pointer2');
                $('#pointer2').fadeOut();
                $('#pointer2').stop(true, true);
                $('.help_close').fadeOut();
                $('#sample_user').replaceWith('<input type="hidden" class="sample_user">');
                $('.match_user:first').fadeIn();
                $('.good_btn').hide();
                $(".match_user").prop("disabled", false);
            });
        }, 1000);
    }
    // ヘルプボタンクリック時
    $(document).on('click', '.help_btn', function() {
        $('.match_user:first').hide();
        $('.sample_user').replaceWith('<div class="sample_user" id="sample_user" data-target="#matchuser_0" data-toggle="matchuser"><div id="matchuser_0"><img class="match_user_img" src="/storage/user/sample_user.png"><div class="match_user_profile"><div><span class="match_user_occupation">システムエンジニア</span><span class="match_user_age">24歳</span></div><input type="hidden" class="match_user_prof" value="テスト"></div><input type="hidden" class="match_flg" value="0"><input type="hidden" class="matchs_flg" value="0"><input type="hidden" class="match_user_id" value="0"><input type="hidden" class="match_user_name" value="サンプルユーザー"><input type="hidden" class="match_user_address" value="東京都"><input type="hidden" class="match_user_occupation" value="システムエンジニア"><input type="hidden" class="match_user_skill" value="PHP Laravel AWS"><input type="hidden" class="match_user_licence" value="ITパスポート 基本情報技術者"><input type="hidden" class="match_user_workhistory" value="テスト"><input type="hidden" class="click_flg" value><img src="storage/user/sample_user.png" class="match_user_img" style="display:none;"></div></div>');
        $('.modal_help').fadeIn();
        $('#pointer').addClass('pointer');
        $('.pointer').fadeIn();
        $('.help_message').fadeIn();
        $('.help_close').fadeIn();
        $('#sample_user').css({
            'z-index': '15',
            'position': 'relative'
        });
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
        // ユーザー詳細画面
        $(document).on('click', "#sample_user", function() {
            var $target_modal = $(this).data("target");
            $('.modal_match').hide();
            $('.fa-times-circle').hide();
            $('.help_close').fadeIn();
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
            $('.match_good_btn').hide();
            $('.good_btn').show();
            $('.matchuser_detaile').css({
                'z-index': '25'
            });
            $('#pointer2').css({
                'z-index': '30'
            });
            $('.match_user:first').css({
                'z-index': '0',
                'position': 'unset'
            });
            $('.help_message').fadeOut();
            $('.help_message2').fadeIn();
            $('.pointer').fadeOut();
            $('#pointer2').addClass('pointer2');
            $('.pointer2').fadeIn();
            setInterval(function() {
                $('.pointer2').animate({
                    'left': '45%',
                    'top': '73%'
                });
                $('.pointer2').fadeOut();
                $('.pointer2').animate({
                    'left': '38%',
                    'top': '80%'
                });
                $('.pointer2').fadeIn();
            }, 1000);
            $(document).on('click', ".match_good_btn", function() {
                $('#pointer2').removeClass('pointer2');
                $('#pointer2').fadeOut();
            });
        });
        $(document).on('click', ".help_close", function() {
            $('.matchuser_detaile').fadeOut();
            $('.matchuser_detaile_prof').fadeOut();
            $('.help_message').fadeOut();
            $('.help_message2').fadeOut();
            $('.modal_help').fadeOut();
            $('#pointer').removeClass('pointer');
            $('#pointer').fadeOut();
            $('#pointer').stop(true, true);
            $('#pointer2').removeClass('pointer2');
            $('#pointer2').fadeOut();
            $('#pointer2').stop(true, true);
            $('.help_close').fadeOut();
            $('#sample_user').replaceWith('<input type="hidden" class="sample_user">');
            $('.match_user:first').fadeIn();
            $('.good_btn').hide();
        });
    });

    var num = 0;
    $(".match_good_btn").click(function() {
        $(this).data("click", ++num);
        var click = $(this).data("click");
        $('.match_count').text(num);
        if (click == 3) {
            $('.col-8.offset-2.center').fadeOut();
            $('.matchuser_detaile').fadeOut();
            $('.matchuser_detaile_prof').fadeOut();
            $('.modal_match').fadeOut();
            $('.welcome').fadeIn();
            $('.match_box').fadeOut();
            setTimeout(function() {
                window.location.href = "/top";
            }, 2000);
        }
    });
</script>
@endsection