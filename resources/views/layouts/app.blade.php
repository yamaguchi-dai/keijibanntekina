<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title')&nbsp;|&nbsp;YAMASA</title
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=yes">
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style type="text/css">
            .row{
                font-size: 38px;
            }
            
            nav{
                height: 150px;
            }
            
            ul.sidenav a{
                font-size: 50px;
                margin: 20px;
            }
            
            .card{
                border-radius: 20px;  
            }
        </style>
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo center" style="margin-top: 40px;font-size: 80px;">YAMASA</a>
                <ul id="nav-mobile" class="left">
                    <li> <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size:100px;margin-top: 35px;">menu</i></a></li>
                </ul>
            </div>
        </nav>
        <!-- サイドバ系 -->
        <ul id="slide-out" class="sidenav" style="width:500px">
            <li><a href="/top">新規登録</a></li>
            <li><a href="/auth/twitter">ログイン</a></li>
            <li><a href="/user">自分宛の質問</a></li>
            <li><a href="/logout">ログアウト</a></li>
        </ul>
        <!-- メインコンテンツエリア -->
        <div class="container" style="margin-top: 30px">
            @yield('content')
        </div>
        <!--  Scripts-->
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/materialize.min.js"></script>
        <script src="/js/init.js"></script>
        @stack('scripts')
        <script type="text/javascript">

$(document).ready(function () {
    $('select').select();
    $('.sidenav').sidenav();
});
        </script>
    </body>
</html>