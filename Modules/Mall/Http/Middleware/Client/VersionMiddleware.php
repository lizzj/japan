<?php

namespace Modules\Mall\Http\Middleware\Client;

use App\Exceptions\Exception\BaseException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Mall\Repositories\Interfaces\System\VersionRepository;

class VersionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        if (Arr::has($request->header(), 'version-code') && Arr::has($request->header(), 'version-platform') && Arr::has($request->header(), 'version-remind')) {
            $result = $this->verifyCode($request->header()['version-code'][0], $request->header()['version-platform'][0]);
            if ($result) {
                if ($result === 60001) {
                    throw new BaseException('valid', ['code' => 60008]);
                } else {
                    if ($result['force'] === 'yes') {
                        throw new BaseException('success', ['code' => 22001, 'data' => $result]);
                    } else {
                        if ($request->header()['version-remind'][0] === 'yes') {
                            throw new BaseException('success', ['code' => 22001, 'data' => $result]);
                        } else {
                            return $next($request);
                        }
                    }

                }
            } else {
                return $next($request);
            }
        } else {
            throw new BaseException('valid', ['code' => 60008]);
        }
    }

    public function verifyCode($code, $platform)
    {
        $version = app(VersionRepository::class);
        return $version->verify($code, $platform);
    }
}
