<?php

namespace Modules\Mall\Repositories\Presenters\System;

use Modules\Mall\Repositories\Transformers\System\NoticeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class NoticePresenter extends FractalPresenter
{
    public function getTransformer(): NoticeTransformer
    {
        return new NoticeTransformer();
    }
}
