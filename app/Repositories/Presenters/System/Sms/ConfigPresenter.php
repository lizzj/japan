<?php

namespace App\Repositories\Presenters\System\Sms;

use App\Repositories\Transformers\System\Sms\ConfigTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConfigPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Sms;
 */
class ConfigPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConfigTransformer();
    }
}
