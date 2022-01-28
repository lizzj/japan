<?php
/**
 * 图片Base64保存
 */
if (!function_exists('ImageDetail')) {
    /**
     * @throws Exception
     */
    function ImageDetail($prefix, $image_info, $path)
    {
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $image_info, $result)) {
            $type = $result[2];
            $ping_url = $prefix . time() . random_int(1000, 9999) . ".{$type}";
            $local_file_urls = $path . $ping_url;
            if (file_put_contents($local_file_urls, base64_decode(str_replace($result[1], '', $image_info)))) {
                return $local_file_urls;
            }
            return false;
        }
        return false;
    }
}
/**
 * 图片下载保存
 */
if (!function_exists('imageSave')) {
    function imageSave($folder, $url)
    {
        $header = array(
            'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:45.0) Gecko/20100101 Firefox/45.0',
            'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
            'Accept-Encoding: gzip, deflate',
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $dataimg = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($code == 200) {
            $imgBase64Code = "data:image/jpeg;base64," . base64_encode($dataimg);
            return ImageDetail('Avatar', $imgBase64Code, $folder);
        } else {
            return false;
        }
    }
}
