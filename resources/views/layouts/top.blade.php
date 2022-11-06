<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/match.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" rel="stylesheet">
</head>

<body>
    @section('header')
    @if (Auth::check())
    <ul class="main_ul">
        <li class="top_link">
            <a sytle="margin: -0.5rem 0 0 -1.2rem;" href="{{ asset('top') }}" class="top_link_header_login"><img
                    src="../Untitled.svg"></a>
        </li>
        <li class="header_menu_wide"><a href="../match/matching.php" style="vertical-align: middle;"><i
                    class="fas fa-thumbs-up" style="margin-right: 0.5rem;font-size: 1.5rem;"></i>お相手から</a>
        </li>
        <li class="header_menu"><a href="../message/message_top.php" style="vertical-align: middle;">
                <i class="fas fa-comment" style="margin-right: 0.5rem;"></i>メッセージ
            </a></li>
        <li class="header_menu_wide" style="vertical-align: middle;"><a href="{{ asset('user/logout') }}"
                style="vertical-align: middle;"><i class="fas fa-sign-out-alt"
                    style="margin-right: 0.5rem;"></i>ログアウト</a>
        </li>
    </ul>
    @else
    <nav class="navbar navbar-dark">
        <ul class="main_ul">
            <li class="top_link">
                <a sytle="margin: -0.5rem 0 0 -1.2rem;" href="{{ asset('top') }}" class="top_link_header"><img
                        src="../Untitled.svg"></a>
            </li>
            <li class="header"><a href="{{ asset('user/login') }}" style="vertical-align: middle;"><i
                        class="fas fa-sign-in-alt" style="margin-right: 0.5rem;"></i>ログイン</a></li>
            <li class="header"><a href="{{ asset('user/add') }}" style="vertical-align: middle;"><i
                        class="fas fa-user-plus" style="margin-right: 0.5rem;"></i>新規登録</a></li>
        </ul>
    </nav>
    @endif
    @show
    <div class="content">
        @yield('content')
    </div>
    @section('footer')
    <div class="footer">
        <a href="https://forms.gle/eLx24ykodQaRKqiV9">お問い合わせ</a> / <a href="../privacy_policy.php">プライバシーポリシー</a> / <a
            href="https://twitter.com/karirin3948">Twitter</a>
    </div>
    <script src=" https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <script src="{{ asset('/js/match.js') }}"></script>
    @show
</body>

</html>