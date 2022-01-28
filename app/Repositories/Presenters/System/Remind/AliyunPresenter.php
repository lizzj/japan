<?php

namespace App\Repositories\Presenters\System\Remind;

use App\Repositories\Transformers\System\Remind\AliyunTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AliyunPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Remind;
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
