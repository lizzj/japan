<?php

namespace Modules\Mall\Repositories\Presenters\System;

use Modules\Mall\Repositories\Transformers\System\ConfigTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ConfigPresenter extends FractalPresenter
{
    public function getTransformer(): ConfigTransformer
    {
        return new ConfigTransformer();
    }
}
