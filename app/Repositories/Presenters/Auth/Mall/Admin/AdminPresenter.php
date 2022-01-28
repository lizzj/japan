<?php

namespace App\Repositories\Presenters\Auth\Mall\Admin;

use App\Repositories\Transformers\Auth\Mall\Admin\AdminTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AdminPresenter.
 *
 * @package namespace App\Repositories\Presenters\Auth\Mall\Admin;
 */
class AdminPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AdminTransformer();
    }
}
