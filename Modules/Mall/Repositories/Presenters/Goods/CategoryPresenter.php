<?php

namespace Modules\Mall\Repositories\Presenters\Goods;

use Modules\Mall\Repositories\Transformers\Goods\CategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class CategoryPresenter extends FractalPresenter
{
    public function getTransformer(): CategoryTransformer
    {
        return new CategoryTransformer();
    }
}
