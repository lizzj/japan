<?php

namespace App\Repositories\Presenters\System\Payment;

use App\Repositories\Transformers\System\Payment\AlipayTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AlipayPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Payment;
 */
class AlipayPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AlipayTransformer();
    }
}
