<?php

namespace App\Repositories\Presenters\Auth\User;

use App\Repositories\Transformers\Auth\User\LevelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LevelPresenter.
 *
 * @package namespace App\Repositories\Presenters\Auth\User;
 */
class LevelPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LevelTransformer();
    }
}
