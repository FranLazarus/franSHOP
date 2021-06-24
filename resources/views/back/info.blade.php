@extends('back.layouts.app')

@section('link')
    <link href="{{ asset('css/products_form.css') }}" rel="stylesheet">
@endsection
@section('style')
    <style>
        .small-block{
            /*background-color: #8c9;*/
            padding-top: 2em;
            vertical-align: text-top;
        }
    </style>
@endsection

@section('title','開發人員簡介')

@section('content')
<main class="col-10 p-5" id="content">
    <h2>@yield('title')</h2>
    <h4>陳怡蒨</h4>
    <div class="small-block col-5">
        <label class="small-title">聯繫資訊</label>
        <p>電話：0933850473</p>
        <p>電子郵件：fran0115@yahoo.com.tw</p>
    </div>
    <div class="small-block col-5">
        <label class="small-title">居住地</label>
        <p>台北市中山區</p>
    </div>
    <div class="small-block col-5">
        <label class="small-title">學歷</label>
        <span>大葉大學電機工程學系</span>
    </div>
    <div class="small-block col-5">
        <label class="small-title">英文能力</label>
        <span>中等</span>
    </div>
    <div class="small-block col-5">
        <label class="small-title">相關經歷</label>
        <p>集邦科技-PHP工程師  (3個月)</p>
        <p>喜士多科技  (2年)</p>
        <p>楊梅職業訓練場-跨平台網頁設計班  (2.5個月)</p>
        <p>中壢資策會-Web/APP網頁設計工程師養成班  (6個月)</p>
    </div>
    <div class="small-block col-5">
        <label class="small-title">技術</label>
        <p>程式語言：PHP、JavaScript、CSS3</p>
        <p>資料庫：MSSQL、MySQL</p>
        <p>框架：Laravel、Codeigniter、BootStrap</p>
        <p>版控：GIT、SVN</p>
        <p>作業系統：Windows、LINUX</p>
        <p>其他：jQuery</p>
    </div>
</main>
@endsection