<?php

namespace Modules\Mall\Repositories\Presenters\Member\Asset;

use Modules\Mall\Repositories\Transformers\Member\Asset\BalanceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class BalancePresenter extends FractalPresenter
{
    public function getTransformer(): BalanceTransformer
    {
        return new BalanceTransformer();
    }
}
