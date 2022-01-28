<?php

namespace Modules\Mall\Http\Controllers\Client\Member\Withdrawal;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\TypeRepository;

class TypeController extends ClientController
{
    public function __construct(TypeRepository $type)
    {
        $this->type = $type;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->type->orderBy('sort','desc')->findByField('status','on')]);
    }
}
