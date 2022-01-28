<?php

namespace Modules\Mall\Repositories\Presenters\System;

use Modules\Mall\Repositories\Transformers\System\OnlineTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class OnlinePresenter extends FractalPresenter
{
    public function getTransformer(): OnlineTransformer
    {
        return new OnlineTransformer();
    }
}
