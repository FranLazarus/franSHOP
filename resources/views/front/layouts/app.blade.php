<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('includes')

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <style>
        #content{
            margin: 40px auto;
            width: 80%;
        }
        #search form{
            float: right;
            width: 183px;
        }
        #keyWord{
            color: #666;
            border: 1px #ccc solid;
            width: 100%;
            height: 25px;
            float: right;
            padding-left: 5px;
            line-height: 2.2;
        }
        #search .search_btn{
            position: relative;
            width: 40px;
            height: 27px;
            left:142px;
            top:-27px;
            background: transparent url(/images/btn_search.gif) no-repeat center center;
            border: none;
            cursor: pointer;
        }
        #entrance{
            color: #4d3126;
            color: #875123;
            /* display: inline; */
            list-style-position: inside;
            float: right;
            margin-top: 14px;
            margin-left: 0;
            padding-left: 10px;
        }
        #entrance>div{
            color: #706e6c;
            border-left: 1px dotted #d0d0d0;
            height: 12px;
            display: inline-block;
            text-align: center;
            padding-left: 12px;
            padding-right: 10px;
        }
        #cart_entrance{
            background-image: url(/images/ShoppingCart.gif);
            background-repeat: no-repeat;
            background-position: 0 -3px;
            padding-left: 30px;
        }
        #footer{
            padding-top: 30px;
            border-top: 1px solid #eee;
            margin-bottom: 55px;
        }
        #footer{
            display: flex;
            justify-content:space-around;
        }
        #footer>div{

            width: 40%;
            text-align: center;
            letter-spacing: 1px;
        }
        #footer .last{
            border-right: 0;
        }
        #footer a,#footer span{
            padding: 0 11px;
            color: #706e6c;
            border-right: 1px solid #706e6c;
        }
    </style>
</head>
<body>
    <div id="content">
        <span id="search">
            <form action="" method="get" onsubmit="this.submit();return false;" autocomplete="off">
                <input id="keyWord" maxlength="100" name="keyWord" size="13" type="text" placeholder="SEARCH">
                <input type="submit" class="search_btn" value="">
            </form>
        </span>
        <div id="entrance">
            <div class="member_entrance">
                <div>

                    <a href="{{ url('/') }}">首頁</a>

                    <a href="#">登入 </a>

                    <a href="#">註冊</a>
                </div>
            </div>
            <div id="cart_entrance">
                <a href="#">
                    <span>0</span>個商品
                </a>
            </div>
        </div>
        @include('front.layouts.nav')

        @yield('content')

        @section('footer')
        <div id="footer">
            <div>
                <a href="#">聯絡我們</a>
                <a href="#">購物說明</a>
                <a href="#">最新消息</a>
                <a href="#" class="last">品牌日誌</a>
            </div>
            <div>
                <a href="#">網站使用條款</a>
                <a href="#">隱私權政策</a>
                <a href="#">免責聲明</a>
                <span class="last">©{{ date('Y') }}</span>
            </div>
        </div>
        @show
    </div>
</body>
</html>