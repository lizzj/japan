<?php

namespace Modules\Mall\Repositories\Presenters\Member\Asset;

use Modules\Mall\Repositories\Transformers\Member\Asset\CommissionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class CommissionPresenter extends FractalPresenter
{
    public function getTransformer(): CommissionTransformer
    {
        return new CommissionTransformer();
    }
}
