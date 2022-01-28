<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$configInfo->name}}--App下载</title>
    <style>
        .main {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding-top: 25%;
            z-index: -10;
            zoom: 1;
            background-color: #fff;
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            background-position: center 0;
        }

        .inside-block {
            width: 80%;
            height: 100%;
            margin: 0 auto;
        }

        .inside-block img {
            margin: 0 auto;
        }

        .kj {
            width: 100%;
            min-height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, .5);
            display: none
        }
    </style>
</head>
<body>
<div class="kj" id="wx">
    <img src="{{ URL::asset('Register/images/reg_tip.png') }}" width="100%">
</div>
<div class="main" style="background-image:url({{'./Register/images/reg_back.jpg'}})">
    <div align="center" class="inside-block">
        <div style="width:180px;height:180px;border:1px #dedede solid;border-radius:20%;overflow: hidden;">
            <img src='{{URL::asset($configInfo->logo) }}' width="100%" alt="">
        </div>
        <h1 style="margin-bottom:50px;">{{$configInfo->name}}</h1>
        <div
            style="height:50px;width:90%;border-radius:80px;background:#FF9933;color:white;line-height: 50px;font-size:24px;"
            onclick='getDownload("{{$versionInfo->url}}")'>
            立即下载
        </div>
        <div style="color:#dedede;font-size:17px;margin-top:50px;font-weight: 560;">
            <div style="height: 40px;line-height: 40px;"> 版本: {{$versionInfo->version}} | 大小:{{$size}}M</div>
            <div style="height: 40px;line-height: 40px;"> 发布时间: {{$versionInfo->created_at->format('Y-m-d')}}</div>
        </div>
    </div>
</div>
<script>
    function getDownload(url) {
        var link = 'https://qk.shanxi12.com/' + url
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            document.getElementById('wx').style.display = 'block';
        } else {
            window.location.href = link;
        }
    }
</script>
</body>
</html>
