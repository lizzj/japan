<?php

namespace App\Repositories\Presenters\System\Payment;

use App\Repositories\Transformers\System\Payment\WechatTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WechatPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Payment;
 */
class WechatPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WechatTransformer();
    }
}
