<?php
/**
 * 检测手机端
 */
if (!function_exists('isMobile')) {
    function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA'])) {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }
}
/**
 * 获取访问ip
 */
if (!function_exists('getClientIp')) {
    function getClientIp()
    {
        static $ip = '';
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_CDN_SRC_IP'])) {
            $ip = $_SERVER['HTTP_CDN_SRC_IP'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) and preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
            foreach ($matches[0] as $xip) {
                if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                    $ip = $xip;
                    break;
                }
            }
        }
        return $ip;
    }
}
/**
 * 获取最小值
 */
if (!function_exists('getMinNum')) {
    function getMinNum($a, $b)
    {
        if ($a > $b) {
            return $b;
        } else {
            return $a;
        }
    }
}
/**
 * 获取最大值
 */
if (!function_exists('getMaxNum')) {
    function getMaxNum($a, $b)
    {
        if ($a > $b) {
            return $a;
        } else {
            return $b;
        }
    }
}
/**
 * Excel 导出
 */
if (!function_exists('decimal2ABC')) {
    function decimal2ABC($num)
    {
        $ABCstr = "";
        $ten = $num - 1;
        if ($ten == 0) return "A";
        while ($ten != 0) {
            $x = $ten % 26;
            $ABCstr .= chr(65 + $x);
            $ten = intval($ten / 26);
        }
        return strrev($ABCstr);
    }
}
/**
 * Excel 导出
 */
if (!function_exists('extractNum')) {
    function extractNum($str)
    {
        $str = trim($str);
        if (empty($str)) {
            return '';
        }
        $temp = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        $result = '';
        for ($i = 0, $iMax = strlen($str); $i < $iMax; $i++) {
            if (in_array($str[$i], $temp)) {
                $result .= $str[$i];
            }
        }
        return $result;
    }
}
/**
 * 栏目递归
 */
if (!function_exists('processCategory')) {
    function processCategory($cates, $pid)
    {
        $data = [];
        foreach ($cates as $k => $v) {
            if ($v->pid == $pid) {
                $v->children = processCategory($cates, $v->id);
                $data[] = $v;
            }
        }
        return $data;
    }
}
/**
 * 栏目递归
 */
if (!function_exists('processEcharts')) {
    function processEcharts($item, $pid)
    {
        $data = [];
        foreach ($item as $k => $v) {
            if ((int)$v->code_no === 0) {
                $h_code = $v->id;
            } else {
                $h_code = $v->code_no . '.' . $v->id;
            }
            if ($v->code_no == $h_code) {
                $v->children = processCategory($item, $v->h_code);
                $data[] = $v;
            }
        }
        return $data;
    }
}

/**
 * 过滤表情
 */
if (!function_exists('filterEmoji')) {
    function filterEmoji($str)
    {
        $str = preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str);
        return $str;
    }
}
/**
 * 处理异常回调时使用
 */
if (!function_exists('endStr')) {
    function endStr($str): string
    {
        $array = explode('\\', str_replace("/", "\\", $str));
        return end($array);
    }
}
/**
 * 验证是否整除
 */
if (!function_exists('isDivisible ')) {
    function isDivisible($num, $base): string
    {
        if ($num % $base === 0) {
            return true;
        }
        return false;
    }
}
