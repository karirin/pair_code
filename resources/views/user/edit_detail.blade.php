@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<h2 style="text-align: center;">新規登録</h2>
<form method="post" action="{{ asset('user/edit_detail') }}" enctype="multipart/form-data">
    @csrf
    <div class="row" style="margin-left: 30%;height: 60%;">
        <div class="col-3">
            <div class="user_age">
                <p class="tag_tittle">年齢</p>
                <input class="edit_age form-control" type="number" name="age"
                    style="width: 35%;display: inline-block;margin-right: 0.5rem;">歳
            </div>
            <div class="user_address" style="margin-top: 0.5rem;">
                <p class="tag_tittle" style="display: inline-block;">住所</p>
                <select name="address" class="form-control edit_address">
                    <option value="">--選択してください--</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
            </div>
            <div class="user_occupation" style="margin-top: 0.5rem;">
                <p class="tag_tittle" style="display: inline-block;">職種</p>
                <select name="occupation" class="form-control edit_occupation" style="width: auto;">
                    <option value="">--選択してください--</option>
                    <option value="ネットワークエンジニア">ネットワークエンジニア</option>
                    <option value="Webエンジニア">Webエンジニア</option>
                    <option value="フロントエンドエンジニア">フロントエンドエンジニア</option>
                    <option value="インフラエンジニア">インフラエンジニア</option>
                    <option value="サーバーエンジニア">サーバーエンジニア</option>
                    <option value="データベースエンジニア">データベースエンジニア</option>
                    <option value="IoTエンジニア">IoTエンジニア</option>
                    <option value="制御・組み込みエンジニア">制御・組み込みエンジニア</option>
                    <option value="テストエンジニア">テストエンジニア</option>
                    <option value="その他">その他</option>
                </select>
            </div>
        </div>
        <div class="col-7" style="margin-left: 4rem;">
            <p class="tag_tittle">スキル</p>
            <div id="myprofile_skill">
                <input type="hidden" name="myprofile_skills" id="myprofile_skills">
                <input type="hidden" name="skill_count" id="myprofile_skill_count">
                <input type="hidden" name="myskills">
            </div>
            <input placeholder="skill Stack" name="skills" id="skill_myprofile_input" style="display:block;"
                class="ui-autocomplete-input" autocomplete="off">
            <p class="tag_tittle">取得資格</p>
            <div id="licence">
                <input type="hidden" name="myprofile_licences" id="myprofile_licences">
                <input type="hidden" name="licence_count" id="licence_count">
                <input type="hidden" name="mylicences">
            </div>
            <input placeholder="licence Stack" name="name" id="licence_input" style="display: block;" />
            <div class="background">
                <p class="tag_tittle">職歴</p>
                <textarea class="edit_workhistory form-control" style="height: 30%;width: 70%;" type="text"
                    name="user_workhistory"></textarea>
                <div class="error_workhistory" style="display: none;">
                    <span style="color:rgb(220, 53, 69);">100文字以内で入力してください</span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex_btn margin_top" style="margin: 0 32%;width: 35%;">
        <input class="btn btn-outline-info" type="button" onclick="history.back()" value="戻る">
        <a class="skip_btn"
            href="/user/skip?name={{$name}}&password={{$password}}&hash_password={{$hash_password}}&image={{$image}}">スキップ</a>
        <input class="btn btn-outline-dark edit_done" type="submit" value="登録">
    </div>
    <input type="hidden" name="name" value="{{$name}}">
    <input type="hidden" name="password" value="{{$password}}">
    <input type="hidden" name="hash_password" value="{{$hash_password}}">
    <input type="hidden" name="image" value="{{$image}}">
    <input type="hidden" id="licence_narrow" value>
    <input type="hidden" id="licence_input_narrow" value>
    <input type="hidden" id="licence_narrow" value>
    <input type="hidden" id="licence_count_narrow" value>
    <input type="hidden" id="myprofile_skill_count" value>
    <input type="hidden" id="skill_count_narrow" value>
    <input type="hidden" id="skill_narrow" value>
    <input type="hidden" id="skills_narrow" value>
</form>
</div>
@endsection
@section('footer')
@parent
@endsection