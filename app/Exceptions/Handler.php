<?php

namespace App\Exceptions;

use App\Exceptions\Exception\BaseException;
use App\Exceptions\Exception\ErrorException;
use Carbon\Carbon;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    // 状态码
    public $resCode;
    // 提示信息
    public $resMsg;
    // 返回信息
    public $resData;
    // 返回类型
    public $resType;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
        \Illuminate\Database\QueryException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param Throwable $exception
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return Response
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof BaseException) {
                $this->resCode = $exception->resCode;
                $this->resMsg = $exception->resMessage;
                $this->resData = $exception->resData;
                $this->resType = $exception->resType;
            } elseif ($exception instanceof AuthenticationException) {
                throw new BaseException('login', ['data' => null, 'code' => 50006]);
            } else {
                $array = ['40005'];
                var_dump($exception);
                die();
                if ($exception->getCode() !== null && in_array($exception->getCode(), $array)) {
                    $this->resCode = $exception->resCode;
                    $this->resMsg = $exception->resMessage;
                    $this->resType = $exception->resType;
                } else {
                    $datas = new ErrorException(endStr(get_class($exception)), $exception);
                    $this->resCode = $datas->resCode;
                    $this->resMsg = $datas->resMessage;
                    $this->resData = $datas->resData;
                    $this->resType = $datas->resType;
                }
            }
            $response_data = [
                'code' => $this->resCode,
                'data' => $this->resData,
                'message' => $this->resMsg,
                'type' => $this->resType,
                'timestamp' => Carbon::now()->timestamp
            ];
//            app('log')->debug(sprintf('params [%s] response [%s]',
//                json_encode(request()->all(), JSON_UNESCAPED_UNICODE),
//                json_encode($response_data, JSON_UNESCAPED_UNICODE)
//            ));
            return response()->json(ArrayDetail($response_data))->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        } else {//普通请求
//            return response()->json(['code' => 404, 'msg' => '呵呵'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            return parent::render($request, $exception);
        }

    }
}
