// 変数定義
var user_age = $('.form .age').text(),
    user_age_narrow = $('.form .age_narrow').text(),
    user_occupation = $('.form .occupation').text(),
    user_occupation_narrow = $('.form .occupation_narrow').text(),
    user_address = $('.form .address').text(),
    user_address_narrow = $('.form .address_narrow').text(),
    user_workhistory = $('.form .workhistory').text(),
    user_workhistory_narrow = $('.form .workhistory_narrow').text();

window.onload = function() {
    for (i = 0; i < $('.match_user').length; i++) {
        switch ($('.match_user_occupation')[i].textContent) {
            case "ネットワークエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #cb30ff2b;');
                break;
            case "Webエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #0005ff2b;');
                break;
            case "フロントエンドエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #4cfceb2b;');
                break;
            case "インフラエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #edcf312b;');
                break;
            case "サーバーエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #b100a72b;');
                break;
            case "データベースエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #c571272b;');
                break;
            case "IoTエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #b6082c2b;');
                break;
            case "制御・組み込みエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #1ab53d2b;');
                break;
            case "テストエンジニア":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #0057212b;');
                break;
            case "その他":
                $('.match_user_occupation')[i].setAttribute("style", 'background-color: #3738372b');
                break;
            default:
        }
    }
}

// 編集ボタン押下時の処理
$(document).on('click', '.profile_edit_btn', function() {
    scroll_position = $(window).scrollTop();
    $('.profile_edit_btn').fadeOut();
    $('.myprofile_count').fadeOut();
    $('.follow_user').fadeOut();
    $('.comment').replaceWith('<textarea class="edit_comment form-control" type="text" name="user_comment" >' + user_comment);
    $('.profile_name').replaceWith('<input class="edit_name form-control" type="text" name="user_name" value="' + user_name + '">');
    $('.profile_name_narrow').replaceWith('<input class="edit_name form-control" type="text" name="user_name_narrow" value="' + user_name_narrow + '">');
    $('.form .age').replaceWith('<input class="edit_age form-control" type="number" name="user_age" value="' + user_age + '" style="width: 30%;display: inline-block;margin-right: 0.5rem;">');
    $('.form .age_narrow').replaceWith('<input class="edit_age form-control" type="number" name="user_age_narrow" value="' + user_age_narrow + '" style="width: 30%;display: inline-block;margin-right: 0.5rem;">');
    $('.form .occupation').replaceWith('<select name="occupation" class="form-control edit_occupation" value="' + user_occupation + '"><option value="ネットワークエンジニア">ネットワークエンジニア</option><option value="Webエンジニア">Webエンジニア</option><option value="フロントエンドエンジニア">フロントエンドエンジニア</option><option value="インフラエンジニア">インフラエンジニア</option><option value="サーバーエンジニア">サーバーエンジニア</option><option value="データベースエンジニア">データベースエンジニア</option><option value="IoTエンジニア">IoTエンジニア</option><option value="制御・組み込みエンジニア">制御・組み込みエンジニア</option><option value="テストエンジニア">テストエンジニア</option><option value="その他">その他</option></select>');
    $('.form .occupation_narrow').replaceWith('<select name="occupation_narrow" class="form-control edit_occupation" value="' + user_occupation_narrow + '"><option value="ネットワークエンジニア">ネットワークエンジニア</option><option value="Webエンジニア">Webエンジニア</option><option value="フロントエンドエンジニア">フロントエンドエンジニア</option><option value="インフラエンジニア">インフラエンジニア</option><option value="サーバーエンジニア">サーバーエンジニア</option><option value="データベースエンジニア">データベースエンジニア</option><option value="IoTエンジニア">IoTエンジニア</option><option value="制御・組み込みエンジニア">制御・組み込みエンジニア</option><option value="テストエンジニア">テストエンジニア</option><option value="その他">その他</option></select>');
    $(".form .edit_occupation option[value='" + user_occupation + "']").prop('selected', true);
    $('.form .address').replaceWith('<select name="address" class="form-control edit_address" value="' + user_address + '"><option value="北海道">北海道</option><option value="青森県">青森県</option><option value="岩手県">岩手県</option><option value="宮城県">宮城県</option><option value="秋田県">秋田県</option><option value="山形県">山形県</option><option value="福島県">福島県</option><option value="茨城県">茨城県</option><option value="栃木県">栃木県</option><option value="群馬県">群馬県</option><option value="埼玉県">埼玉県</option><option value="千葉県">千葉県</option><option value="東京都">東京都</option><option value="神奈川県">神奈川県</option><option value="新潟県">新潟県</option><option value="富山県">富山県</option><option value="石川県">石川県</option><option value="福井県">福井県</option><option value="山梨県">山梨県</option><option value="長野県">長野県</option><option value="岐阜県">岐阜県</option><option value="静岡県">静岡県</option><option value="愛知県">愛知県</option><option value="三重県">三重県</option><option value="滋賀県">滋賀県</option><option value="京都府">京都府</option><option value="大阪府">大阪府</option><option value="兵庫県">兵庫県</option><option value="奈良県">奈良県</option><option value="和歌山県">和歌山県</option><option value="鳥取県">鳥取県</option><option value="島根県">島根県</option><option value="岡山県">岡山県</option><option value="広島県">広島県</option><option value="山口県">山口県</option><option value="徳島県">徳島県</option><option value="香川県">香川県</option><option value="愛媛県">愛媛県</option><option value="高知県">高知県</option><option value="福岡県">福岡県</option><option value="佐賀県">佐賀県</option><option value="長崎県">長崎県</option><option value="熊本県">熊本県</option><option value="大分県">大分県</option><option value="宮崎県">宮崎県</option><option value="鹿児島県">鹿児島県</option><option value="沖縄県">沖縄県</option></select>');
    $('.form .address_narrow').replaceWith('<select name="address_narrow" class="form-control edit_address" value="' + user_address_narrow + '"><option value="北海道">北海道</option><option value="青森県">青森県</option><option value="岩手県">岩手県</option><option value="宮城県">宮城県</option><option value="秋田県">秋田県</option><option value="山形県">山形県</option><option value="福島県">福島県</option><option value="茨城県">茨城県</option><option value="栃木県">栃木県</option><option value="群馬県">群馬県</option><option value="埼玉県">埼玉県</option><option value="千葉県">千葉県</option><option value="東京都">東京都</option><option value="神奈川県">神奈川県</option><option value="新潟県">新潟県</option><option value="富山県">富山県</option><option value="石川県">石川県</option><option value="福井県">福井県</option><option value="山梨県">山梨県</option><option value="長野県">長野県</option><option value="岐阜県">岐阜県</option><option value="静岡県">静岡県</option><option value="愛知県">愛知県</option><option value="三重県">三重県</option><option value="滋賀県">滋賀県</option><option value="京都府">京都府</option><option value="大阪府">大阪府</option><option value="兵庫県">兵庫県</option><option value="奈良県">奈良県</option><option value="和歌山県">和歌山県</option><option value="鳥取県">鳥取県</option><option value="島根県">島根県</option><option value="岡山県">岡山県</option><option value="広島県">広島県</option><option value="山口県">山口県</option><option value="徳島県">徳島県</option><option value="香川県">香川県</option><option value="愛媛県">愛媛県</option><option value="高知県">高知県</option><option value="福岡県">福岡県</option><option value="佐賀県">佐賀県</option><option value="長崎県">長崎県</option><option value="熊本県">熊本県</option><option value="大分県">大分県</option><option value="宮崎県">宮崎県</option><option value="鹿児島県">鹿児島県</option><option value="沖縄県">沖縄県</option></select>');
    $(".form .edit_address option[value='" + user_address + "']").prop('selected', true);
    $('.workhistory').replaceWith('<textarea class="edit_workhistory form-control" type="text" name="user_workhistory" value="' + user_workhistory + '">' + user_workhistory);
    $('.workhistory_narrow').replaceWith('<textarea class="edit_workhistory form-control" type="text" name="user_workhistory_narrow" value="' + user_workhistory_narrow + '">' + user_workhistory_narrow);
    $('.workhistory_narrower').replaceWith('<textarea class="edit_workhistory form-control" type="text" name="user_workhistory_narrower" >' + user_workhistory_narrower);
    $('.mypage').css('display', 'none');
    $('.edit_profile_img').css('display', 'inline-block');
    $('.btn_flex').css('display', 'flex');
    $('.profile').addClass('editing');
    $('.form').css('display', 'inline-block');
    $('.tag').fadeOut();
    $('.col-3').css('margin-top', '-2rem');
    $('.edit_btns').fadeIn();
    $('.profile_count').fadeOut();
    $('.edit_workhistory').change(function() {
        var str = $('.edit_workhistory')[0].value.length;
        if (str < 100) {
            $('.edit_workhistory')[0].setAttribute("style", "border-color: #ced4da;");
            $('.error_workhistory').fadeOut();
        }
    });
});

// プロフィール編集のキャンセルボタン押下時
$(document).on('click', ".profile_close", function() {
    $('.edit_name').replaceWith('<h2 class="profile_name">' + user_name + '</h2>');
    $('.edit_workhistory').replaceWith('<p class="workhistory">' + user_workhistory + '</p>');
    $('.tag .edit_age').replaceWith('<p class="user_age" style="inline-block">' + user_age + '</p>');
    $('.tag .edit_occupation').replaceWith('<p class="user_occupation">' + user_occupation + '</p>')
    $('.mypage').css('display', 'inline');
    $('.edit_profile_img').css('display', 'none');
    $('.btn_flex').css('display', 'none');
    $('.profile').removeClass('editing');
    $('.profile_edit_btn').fadeIn();
    $('.follow_user').fadeIn();
    $('.edit_btns').fadeOut();
    $('.col-3').css('margin-top', '0rem');
    $('.myprofile_btn').fadeIn();
    $('.form').fadeOut();
    $('.tag').fadeIn();
    $('.profile_count').fadeIn();
});

$(document).on('click', ".profile_narrow_close", function() {
    $('.edit_name').replaceWith('<h2 class="profile_name">' + user_name + '</h2>');
    $('.edit_workhistory').replaceWith('<p class="workhistory">' + user_workhistory + '</p>');
    $('.mypage').css('display', 'inline');
    $('.edit_profile_img').css('display', 'none');
    $('.btn_flex').css('display', 'none');
    $('.profile').removeClass('editing');
    $('.profile_edit_btn').fadeIn();
    $('.edit_btns').fadeOut();
    $('.col-3').css('margin-top', '0rem');
    $('.myprofile_btn').fadeIn();
    $('.form').fadeOut();
    $('.tag').fadeIn();
    $('.profile_count').fadeIn();
    $('.myprofile_count').fadeIn();
});


// ユーザー詳細画面
$(document).on('click', ".match_user", function() {
    var $target_modal = $(this).data("target");
    $('.modal_match').fadeIn();
    $('.matchuser_detaile').fadeIn();
    $('.matchuser_detaile .matchuser_img').attr('src', $($target_modal + ' > .match_user_img')[0].getAttribute('src'));
    $('.matchuser_detaile .matchuser_name').replaceWith('<div class="matchuser_name">' + $($target_modal + ' > .match_user_name')[0].value + '</div>');
    $('.matchuser_detaile .matchuser_age').replaceWith('<span class="matchuser_age">' + $($target_modal + ' > .match_user_profile > div > .match_user_age').text() + '</span>');
    $('.matchuser_detaile .matchuser_address').replaceWith('<span class="matchuser_address">' + $($target_modal + ' > .match_user_address')[0].value + '</span>');
    $('.matchuser_detaile .matchuser_profile').replaceWith('<div class="matchuser_profile">' + $($target_modal + ' > .match_user_profile > .match_user_prof').text() + '</div>');
    $('.matchuser_detaile .matchuser_occupation').replaceWith('<span class="matchuser_occupation">' + $($target_modal + ' > .match_user_occupation')[0].value + '</span>');
    $('.matchuser_detaile .user_id').val($($target_modal + ' > .match_user_id')[0].value);
    $('.matchuser_detaile .matchs_flg').val($($target_modal + ' > .matchs_flg')[0].value);
    if ($($target_modal + ' > .match_flg')[0].value != 0) {
        $('.match_good_btn').hide();
    } else {
        $('.match_good_btn').show();
    }
});

// モーダル画面の灰色の背景をクリックしたら戻るように
$(document).on('click', ".modal_match", function() {
    $('.modal_match').fadeOut();
    $('.matchuser_detaile').fadeOut();
});

// モーダル画面の×印をクリック
$(document).on('click', ".far.fa-times-circle", function() {
    $('.modal_match').fadeOut();
    $('.matchuser_detaile').fadeOut();
});

// いいねをクリックしたとき
$(document).on('click', ".match_good_btn", function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var user_id = $(this).next().val(),
        user_name = $(this).parent().prev().prev().prev().prev().prev().text(),
        matchs_flg = $(this).next().next()[0].value,
        match_good_btn = $(this);
    $.ajax({
        type: 'POST',
        url: '/ajax_match_process',
        dataType: 'text',
        data: {
            user_id: user_id
        }
    }).done(function() {
        if (matchs_flg == 0) {
            $('.match_message').fadeIn();
            $('.match_message').text(user_name + 'さんにいいねを送りました');
            $('.match_message').fadeOut(5000);
        } else {
            $('.match_message').fadeIn();
            $('.match_message').text(user_name + 'さんとマッチしました！');
            $('.match_message').fadeOut(5000);
        }
        match_good_btn.fadeOut();
    }).fail(function() {});
});

// マッチ機能処理
$(document).on('click', '#match_btn', function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var current_user_id = $('.match_user_id').val(),
        target_modal = $(this).data("target"),
        match_modal = $(this).data("match"),
        user_id = $('' + target_modal + '_userid').val(),
        card = $('.match_card:last');
    $(card).animate({
        "marginLeft": "758px"
    }).fadeOut().removeClass('match_card');
    $.ajax({
        type: 'POST',
        url: '/ajax_match_process',
        dataType: 'text',
        data: {
            current_user_id: current_user_id,
            user_id: user_id
        }
    }).done(function() {
        var cookies = document.cookie;
        var cookiesArray = cookies.split(';');

        for (var c of cookiesArray) {
            var cArray = c.split('=');
            if (cArray[0] == ' username') {
                $('.modal_match').fadeIn();
                $(match_modal).fadeIn();
                $('.match_clear').fadeIn();
                $(document).on('click', '.far.fa-times-circle.match_clear', function() {
                    $('.modal_match').hide();
                    $(match_modal).hide();
                    $('.far.fa-times-circle.match_clear').hide();
                });
            }
        }
    }).fail(function() {});
});

$(document).on('click', '#unmatch_btn', function(e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var current_user_id = $('.unmatch_user_id').val(),
        target_modal = $(this).data("target"),
        user_id = $('' + target_modal + '_userid').val(),
        card = $('.match_card:last');
    $(card).animate({
        "marginRight": "758px"
    }).fadeOut().removeClass('match_card');
    $.ajax({
        type: 'POST',
        url: '../ajax_unmatch_process.php',
        dataType: 'text',
        data: {
            current_user_id: current_user_id,
            user_id: user_id
        }
    }).done(function() {}).fail(function() {});
});