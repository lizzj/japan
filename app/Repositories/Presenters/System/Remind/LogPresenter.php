<?php

namespace App\Repositories\Presenters\System\Remind;

use App\Repositories\Transformers\System\Remind\LogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LogPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Remind;
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
