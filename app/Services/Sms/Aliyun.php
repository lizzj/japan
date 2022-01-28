<?php

namespace App\Services\Sms;

use App\Jobs\System\Sms\Send;
use App\Repositories\Interfaces\System\Sms\AliyunRepository;
use App\Repositories\Interfaces\System\Sms\TemplateRepository;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Aliyun
{
    const ENDPOINT_URL = 'http://dysmsapi.aliyuncs.com';
    const ENDPOINT_METHOD = 'SendSms';
    const ENDPOINT_VERSION = '2017-05-25';
    const ENDPOINT_FORMAT = 'JSON';
    const ENDPOINT_REGION_ID = 'cn-hangzhou';
    const ENDPOINT_SIGNATURE_METHOD = 'HMAC-SHA1';
    const ENDPOINT_SIGNATURE_VERSION = '1.0';
    const MAX_RETRY_NUM = 3;
    private $logId;

    public function config()
    {
        $sms = app(AliyunRepository::class);
        return $sms->find(1)['data'];
    }

    public function template($id)
    {
        $template = app(TemplateRepository::class);
        return $template->find($id)['data'];
    }

    /**
     * @note: 发送前的数据处理
     * @return void
     * @author:Je_taime
     * @time: 2022/1/21 16:11
     */
    public function beforeSend()
    {
        //需要将logid传过来然后放到redis中 键值对的格式
//        sms1=>1;
//        如果有则查看几次了  如果没有存在redis中
          
    }

    public function send($logId, $phone, $template_id, $data = [])
    {
        $this->logId = $logId;
        $params = [
            'RegionId' => self::ENDPOINT_REGION_ID,
            'AccessKeyId' => $this->config()['key'],
            'Format' => self::ENDPOINT_FORMAT,
            'SignatureMethod' => self::ENDPOINT_SIGNATURE_METHOD,
            'SignatureVersion' => self::ENDPOINT_SIGNATURE_VERSION,
            'SignatureNonce' => uniqid('', true),
            'Timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
            'Action' => self::ENDPOINT_METHOD,
            'Version' => self::ENDPOINT_VERSION,
            'PhoneNumbers' => $phone,
            'SignName' => $this->template($template_id)['template_sign'],
            'TemplateCode' => $this->template($template_id)['template_no'],
            'TemplateParam' => json_encode($data, JSON_FORCE_OBJECT),
        ];
        $params['Signature'] = $this->generateSign($params);
        return $this->get(self::ENDPOINT_URL, $params);
    }

    public function get($endpoint, $query = [], $headers = [])
    {
        return $this->request('get', $endpoint, [
            'headers' => $headers,
            'query' => $query,
        ]);
    }

    protected function request($method, $endpoint, $options = [])
    {
        return $this->unwrapResponse($this->getHttpClient($this->getBaseOptions())->{$method}($endpoint, $options));
    }

    protected function getBaseOptions()
    {
        $options = method_exists($this, 'getGuzzleOptions') ? $this->getGuzzleOptions() : [];
        return \array_merge($options, [
            'base_uri' => method_exists($this, 'getBaseUri') ? $this->getBaseUri() : '',
            'timeout' => method_exists($this, 'getTimeout') ? $this->getTimeout() : 5.0,
        ]);
    }

    protected function getHttpClient(array $options = [])
    {
        try {
            new Client($options);
        } catch (\Exception $e) {
            Send::dispatch($this->logId);
        }
        return new Client($options);
    }

    protected function unwrapResponse(ResponseInterface $response)
    {
        $contentType = $response->getHeaderLine('Content-Type');
        $contents = $response->getBody()->getContents();

        if (false !== stripos($contentType, 'json') || stripos($contentType, 'javascript')) {
            return json_decode($contents, true);
        } elseif (false !== stripos($contentType, 'xml')) {
            return json_decode(json_encode(simplexml_load_string($contents)), true);
        }
        return $contents;
    }

    protected function generateSign($params)
    {
        ksort($params);
        $accessKeySecret = $this->config()['secret'];
        $stringToSign = 'GET&%2F&' . urlencode(http_build_query($params, null, '&', PHP_QUERY_RFC3986));
        return base64_encode(hash_hmac('sha1', $stringToSign, $accessKeySecret . '&', true));
    }

}
