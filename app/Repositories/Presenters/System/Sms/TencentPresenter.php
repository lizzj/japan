<?php

namespace App\Repositories\Presenters\System\Sms;

use App\Repositories\Transformers\System\Sms\TencentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TencentPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Sms;
 */
class TencentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TencentTransformer();
    }
}
