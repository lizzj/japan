<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\System\Remind\ConfigRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @note:
     * @return void
     * @author:Je_taime
     * @time: 2022/1/5
     */
    public function index(Request $request)
    {
        $a = '31.23691")) AND (SELECT*FROM(SELECT(SLEEP(3)))yeqv) limit 1#';
        $b = 'OR (SELECT*FROM(SELECT(SLEEP(2)))zsxg) limit 1#';
        var_dump((floatval($a)));
        var_dump((floatval($b)));

        if (floatval($a) < 1) {
            var_dump('错误');
        }
        if (floatval($b) < 1) {
            var_dump('正确');
        }
        die();
//        Alipay::where(['id' => 1])->update();
        die;

//        $baseUrl = 'http://81.70.198.250:8000/search';
//        $response = Http::timeout(60)->post($baseUrl, [
//            'keyword' => '临汾',
//            'type' => 1,
//            'time' => 1,
//            'count' => 2,
//        ]);
//        $data = json_decode($response->body(), true);
//        for ($i = 0, $iMax = count($data); $i < $iMax; $i++) {
//            $key[$i] = $data[$i]['aweme_info']['aweme_id'];
//        }
//        var_dump($key);
//        die();

        app(ConfigRepository::class)->update(['next_at' => time() + 5 * 60], 1);
    }


}

