<!DOCTYPE html>
<html>
<head>
    <title>{{$configInfo->name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="注册页面"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="{{ URL::asset('Register/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ URL::asset('Register/css/snow.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ URL::asset('Register/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="{{ URL::asset('Register/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('Register/js/jquery.cookie.js') }}"></script>
    <script>
        $(function () {
            /*防刷新：检测是否存在cookie*/
            if ($.cookie("captcha")) {
                var count = $.cookie("captcha");
                var btn = $('#getting');
                btn.val(count + '秒').attr('disabled', true).css('cursor', 'not-allowed');
                var resend = setInterval(function () {
                    count--;
                    if (count > 0) {
                        btn.val(count + '秒').attr('disabled', true).css('cursor', 'not-allowed');
                        $.cookie("captcha", count, {path: '../', expires: (1 / 86400) * count});
                    } else {
                        clearInterval(resend);
                        btn.val("验证码").removeClass('disabled').removeAttr('disabled style');
                    }
                }, 1000);
            }
            /*点击改变按钮状态，已经简略掉ajax发送短信验证的代码*/
            $('#getCode').click(function () {
                // 获取手机号 并检测是不是符合手机号 如果是则发送;如果不是则弹框
                var phone = document.getElementById('phone').value;
                if (phone === '') {
                    alert('手机号码不能为空');
                    return false;
                } else {
                    var reg = /^1(3|4|5|6|7|8|9)\d{9}$/;
                    //检测
                    var res = reg.test(phone);
                    if (!res) {
                        alert('请输入正确的手机号码');
                        //阻止发送ajax
                        return false;
                    } else {
                        // 获取到正确的手机号之后
                        $.ajax({
                            url: '{{"/api/client/general/sms/send"}}',
                            data: {phone: phone, type: 'register', kind: 'code'},
                            type: 'post',
                            //同步
                            async: false,
                            success: function (data) {
                                //判断签到是否成功
                                alert(data.message);
                                return false;
                            },
                            error: function () {
                                alert('刷新页面');
                            }
                        })
                    }
                }
                ;
                var btn = $(this);
                var count = 60;
                var resend = setInterval(function () {
                    count--;
                    if (count > 0) {
                        btn.val(count + "秒");
                        $.cookie("captcha", count, {path: '/', expires: (1 / 86400) * count});
                    } else {
                        clearInterval(resend);
                        btn.val("验证码").removeAttr('disabled style');
                    }
                }, 1000);
                btn.attr('disabled', true).css('cursor', 'not-allowed');
            });
        });
    </script>

</head>
<body style="width:100%;">
<div class="snow-container">
    <div class="snow foreground"></div>
    <div class="snow foreground layered"></div>
    <div class="snow middleground"></div>
    <div class="snow middleground layered"></div>
    <div class="snow background"></div>
    <div class="snow background layered"></div>
</div>

<div class="top-buttons-agileinfo">
    <a href="/download" class="active">下载App</a>
</div>
<div class="main-agileits">
    <!--form-stars-here-->
    <div class="form-w3-agile">
        <div style="width:60%;margin:0 auto;">
            <img src='{{URL::asset($configInfo->logo) }}' width="50%" alt="">
            <h1>{{$configInfo->name}}</h1>
        </div>
        <div>
            <form class="loginForm">
                <input type="text" value="推荐人:{{$userInfo->name}}--{{$userInfo->phone}}" readonly/>
                <input type="text" name="name" placeholder="请填写您的姓名" required=""/>
                <input type="hidden" name="pid" value="{{$userInfo->id}}"/>
                <input id="phone" type="text" name="phone" placeholder="手机号码" required=""/>
                <div style="display:flex">
                    <div style="width:60%;">
                        <input type="text" name="code" placeholder="验证码" required=""/>
                    </div>
                    <div style="width: 40%">
                        <input type="button" id="getCode" class="get_code" value="验证码"/>
                    </div>
                </div>
                <input type="password" name="password" placeholder="账号密码" required=""/>
                <label class="reg_box"><input type="checkbox" name="check" class="checkbox" required="">
                    <span style="padding-left: 5px;">我已阅读并同意<a href="#" style="margin-left:5px;"
                                                               onclick="showAgreement()">{{$articleInfo->name}}</a></span></label>
                <div class="submit-w3l">
                    <input class="reg_btn" id="regBtn" readonly value="立即注册">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="form-w3-agile" id="reg_box"
     style="z-index:999;position: absolute;top: 1px;margin:0 auto;background:#fff;display:none;">
    <div style="height:580px;margin:0 auto;width:95%;overflow:auto;">
        {!! $articleInfo->content !!}
    </div>
    <div style="position: relative;margin:10px;width:90%;border-top:5px dashed #dedede;">
        <button class="reg_button" onclick="hideAgreement()">我已了解</button>
    </div>
</div>
<script type="text/javascript">
    $('#regBtn').click(function () {
        var pid = $("input[ name='pid'] ").val();
        var phone = $("input[ name='phone'] ").val();
        var code = $("input[ name='code'] ").val();
        var name = $("input[ name='name'] ").val();
        var password = $("input[ name='password'] ").val();
        var check = $("input[ name='check'] ").is(':checked');
        $.ajax({
            url: '{{"/api/client/auth/login/register"}}',
            data: {
                pid: pid,
                phone: phone,
                code: code,
                password: password,
                name: name,
                check: check
            },
            type: 'post',
            //同步
            async: false,
            success: function (data) {
                //判断签到是否成功
                if (data.code === 50021) {
                    alert('注册成功');
                    window.location.href = "/download";
                } else {
                    alert(data.message);
                }
            },
            error: function () {
                alert('刷新页面');
            }
        })
    })

    function showAgreement() {
        $("#reg_box").show()
    }

    function hideAgreement() {
        $("#reg_box").hide()
    }
</script>
</body>
</html>
