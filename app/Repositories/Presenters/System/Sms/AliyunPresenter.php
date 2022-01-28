<?php

namespace App\Repositories\Presenters\System\Sms;

use App\Repositories\Transformers\System\Sms\AliyunTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AliyunPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Sms;
 */
class AliyunPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AliyunTransformer();
    }
}
