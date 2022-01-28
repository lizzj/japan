<?php

namespace Modules\Mall\Repositories\Presenters\System;

use Modules\Mall\Repositories\Transformers\System\VersionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class VersionPresenter extends FractalPresenter
{
    public function getTransformer(): VersionTransformer
    {
        return new VersionTransformer();
    }
}
