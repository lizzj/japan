<?php

namespace Modules\Mall\Http\Controllers\Client\General;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Entities\General\Option;
use Modules\Mall\Http\Controllers\Client\ClientController;

class OptionController extends ClientController
{
    public function option()
    {
        $relate = \request()->relate ?? $this->Error(60021);
        $data = Option::where(['belong' => 'client', 'status' => 'on', 'relate' => $relate])->pluck('name', 'key');
        if ($data->isEmpty()) {
            $this->Error(60018);
        }
        $this->apiOption(['data' => $data]);
    }
}
