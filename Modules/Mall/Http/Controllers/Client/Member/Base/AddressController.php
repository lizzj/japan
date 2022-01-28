<?php

namespace Modules\Mall\Http\Controllers\Client\Member\Base;

use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Http\Requests\Client\Member\Base\Address\CreateRequest;
use Modules\Mall\Http\Requests\Client\Member\Base\Address\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\Member\Base\AddressRepository;

class AddressController extends ClientController
{
    public function __construct(AddressRepository $address)
    {
        $this->authId();
        $this->address = $address;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->address->orderBy('default', 'desc')->orderBy('id', 'desc')->findByField('user_id', $this->authId())]);
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $this->authId();
        if ($data['default'] === 'yes') {
            //修改所有为default为no
            $this->address->resetDefault($this->authId());
        }
        $this->apiCreate(['data' => $this->address->create($data)]);
    }

    public function show($id)
    {
        $this->apiDefault(['data' => $this->address->find($id)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['default'] === 'yes') {
            //修改所有为default为no
            $this->address->resetDefault($this->authId());
        }
        $this->apiUpdate(['data' => $this->address->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->address->delete($id)]);
    }
}
