<?php

namespace App\Repositories\Transformers\System\Payment;

use App\Models\System\Payment\Wechat;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;

/**
 * Class WechatTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Payment;
 */
class WechatTransformer extends TransformerAbstract
{
    public function transform(Wechat $model)
    {
        return [
            'id' => (int)$model->id,
            'mch_id' => $model->mch_id,
            'scene_lang' => $this->processScene($model->scene),
            'mch_public_cert_path' => $model->mch_public_cert_path,
            'mch_secret_cert' => $model->mch_secret_cert,
            'mch_secret_cert_file' => $model->mch_secret_cert_file,
            'mch_secret_key' => $model->mch_secret_key,
            'mode' => $model->mode,
            'mode_type' => $model->mode_type,
            'mode_lang' => $this->processMode($model->mode_type),
            'name' => $model->name,
            'scene' => $model->scene,
            'status' => $model->status,
            'sub_app_id' => $model->sub_app_id,
            'sub_mch_id' => $model->sub_mch_id,
            'sub_mini_app_id' => $model->sub_mini_app_id,
            'sub_mp_app_id' => $model->sub_mp_app_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function processMode($data)
    {
        return Lang::get('mall::General/Option.Payment.Mode.' . $data);
    }

    public function processScene($data)
    {
        $array = [];
        for ($i = 0, $iMax = count($data); $i < $iMax; $i++) {
            $array[] = Lang::get('mall::General/Option.Payment.Scene.' . $data[$i]);
        }
        return $array;
    }
}

