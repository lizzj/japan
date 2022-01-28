<?php

namespace App\Repositories\Transformers\System\Payment;

use App\Models\System\Payment\Alipay;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;

/**
 * Class AlipayTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Payment;
 */
class AlipayTransformer extends TransformerAbstract
{
    /**
     * Transform the Remind entity.
     *
     * @param \App\Models\System\Payment\Alipay $model
     *
     * @return array
     */
    public function transform(Alipay $model)
    {
        return [
            'id' => (int)$model->id,
            'scene' => $model->scene,
            'scene_lang' => $this->processScene($model->scene),
            'name' => $model->name,
            'mode' => (int)$model->mode,
            'mode_type' => $model->mode_type,
            'mode_lang' => $this->processMode($model->mode_type),
            'app_id' => $model->app_id,
            'app_secret_cert' => $model->app_secret_cert,
            'app_secret_cert_file' => $model->app_secret_cert_file,
            'app_public_cert_path' => $model->app_public_cert_path,
            'alipay_public_cert_path' => $model->alipay_public_cert_path,
            'alipay_root_cert_path' => $model->alipay_root_cert_path,
            'status' => $model->status,
            'service_provider_id' => $model->service_provider_id,
            'created_at' => $model->created_at
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
