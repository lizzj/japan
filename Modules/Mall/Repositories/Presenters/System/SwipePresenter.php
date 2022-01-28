<?php

namespace Modules\Mall\Repositories\Presenters\System;

use Modules\Mall\Repositories\Transformers\System\SwipeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class SwipePresenter extends FractalPresenter
{
    public function getTransformer(): SwipeTransformer
    {
        return new SwipeTransformer();
    }
}
