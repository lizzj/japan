<?php

namespace Modules\Mall\Repositories\Presenters\Member\Base;

use Modules\Mall\Repositories\Transformers\Member\Base\AddressTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class AddressPresenter extends FractalPresenter
{
    public function getTransformer(): AddressTransformer
    {
        return new AddressTransformer();
    }
}
