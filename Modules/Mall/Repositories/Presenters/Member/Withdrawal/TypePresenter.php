<?php

namespace Modules\Mall\Repositories\Presenters\Member\Withdrawal;

use Modules\Mall\Repositories\Transformers\Member\Withdrawal\TypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class TypePresenter extends FractalPresenter
{
    public function getTransformer(): TypeTransformer
    {
        return new TypeTransformer();
    }
}
