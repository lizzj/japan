<?php

namespace App\Repositories\Presenters\System\Payment;

use App\Repositories\Transformers\System\Payment\LogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LogPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Payment;
 */
class LogPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LogTransformer();
    }
}
