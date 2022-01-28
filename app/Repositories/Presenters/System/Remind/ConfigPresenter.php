<?php

namespace App\Repositories\Presenters\System\Remind;

use App\Repositories\Transformers\System\Remind\ConfigTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConfigPresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Remind;
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
