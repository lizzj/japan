<?php

namespace Modules\Mall\Repositories\Presenters\Article;

use Modules\Mall\Repositories\Transformers\Article\ArticleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ArticlePresenter extends FractalPresenter
{
    public function getTransformer(): ArticleTransformer
    {
        return new ArticleTransformer();
    }
}
