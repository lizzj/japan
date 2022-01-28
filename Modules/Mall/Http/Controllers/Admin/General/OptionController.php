<?php

namespace Modules\Mall\Http\Controllers\Admin\General;

use Modules\Mall\Entities\General\Option;
use Modules\Mall\Http\Controllers\Admin\AdminController;

class OptionController extends AdminController
{
    public function option()
    {
        $relate = \request()->relate ?? $this->Error(60021);
        $type = \request()->type ?? $this->Error(60021);
        $data = Option::where(['belong' => 'admin', 'status' => 'on', 'relate' => $relate, 'type' => $type])->pluck('name', 'key');
        if ($data->isEmpty()) {
            $this->Error(60018);
        }
        $this->apiOption(['data' => $data]);
    }
}
