<?php

namespace Modules\Mall\Repositories\Presenters\Member\Withdrawal;

use Modules\Mall\Repositories\Transformers\Member\Withdrawal\LogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class LogPresenter extends FractalPresenter
{
    public function getTransformer(): LogTransformer
    {
        return new LogTransformer();
    }
}
