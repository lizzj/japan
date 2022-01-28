<?php

namespace Modules\Mall\Repositories\Presenters\Article;

use Modules\Mall\Repositories\Transformers\Article\CategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class CategoryPresenter extends FractalPresenter
{
    public function getTransformer(): CategoryTransformer
    {
        return new CategoryTransformer();
    }
}
