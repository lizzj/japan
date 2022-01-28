<?php

namespace App\Repositories\Presenters\Auth\Mall\Admin;

use App\Repositories\Transformers\Auth\Mall\Admin\RolesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RolesPresenter.
 *
 * @package namespace App\Repositories\Presenters\Auth\Mall\Admin;
 */
class RolesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RolesTransformer();
    }
}
