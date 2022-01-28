<?php

namespace Modules\Mall\Repositories\Transformers\Member\Base;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Member\Base\Address;


class AddressTransformer extends TransformerAbstract
{
    public function transform(Address $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => $model->user_id,
            'name' => $model->name,
            'phone' => $model->phone,
            'province' => $model->province,
            'city' => $model->city,
            'area' => $model->area,
            'address' => $model->address,
            'default' => $model->default,
            'full_address' => $this->processAddress($model->province, $model->city, $model->area, $model->address),
            'created_at' => $model->created_at
        ];
    }

    public function processAddress($province, $city, $area, $address)
    {
        return $province . $city . $area . $address;
    }
}
