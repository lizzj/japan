<?php

namespace App\Repositories\Presenters\System\Sms;

use App\Repositories\Transformers\System\Sms\TemplateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TemplatePresenter.
 *
 * @package namespace App\Repositories\Presenters\System\Sms;
 */
class TemplatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TemplateTransformer();
    }
}
