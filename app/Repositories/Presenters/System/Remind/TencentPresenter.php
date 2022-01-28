<?php

namespace App\Repositories\Presenters\System\Remind;

use App\Repositories\Transformers\System\Remind\TencentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TencentPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Remind;
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
