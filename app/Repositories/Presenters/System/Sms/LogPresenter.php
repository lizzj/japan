<?php

namespace App\Repositories\Presenters\System\Sms;

use App\Repositories\Transformers\System\Sms\LogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LogPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Sms;
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
