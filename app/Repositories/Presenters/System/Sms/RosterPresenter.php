<?php

namespace App\Repositories\Presenters\System\Sms;

use App\Repositories\Transformers\System\Sms\RosterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RosterPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Sms;
 */
class RosterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RosterTransformer();
    }
}
