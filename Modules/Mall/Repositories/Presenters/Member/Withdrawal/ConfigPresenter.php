<?php

namespace Modules\Mall\Repositories\Presenters\Member\Withdrawal;

use Modules\Mall\Repositories\Transformers\Member\Withdrawal\ConfigTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ConfigPresenter extends FractalPresenter
{
    public function getTransformer(): ConfigTransformer
    {
        return new ConfigTransformer();
    }
}
