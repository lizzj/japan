<?php

namespace Modules\Mall\Http\Controllers\Admin\Member\Center;

use App\Repositories\Interfaces\Auth\User\LevelRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Member\Center\Level\CreateRequest;
use Modules\Mall\Http\Requests\Admin\Member\Center\Level\UpdateRequest;

class LevelController extends AdminController
{
    private LevelRepository $level;

    public function __construct(LevelRepository $level)
    {
        $this->authId();
        $this->level = $level;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->level->orderBy('weight', 'asc')->all()]);
    }

    public function store(CreateRequest $request)
    {
        $this->apiCreate(['data' => $this->level->create($request->validated())]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'main') {
            $data['icon'] = str_replace(config('mall.url'), '', $data['icon']);
        }
        $this->apiUpdate(['data' => $this->level->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->level->delete($id)]);
    }

    public function option()
    {
        $this->apiOption(['data' => $this->level->option()]);
    }
}
