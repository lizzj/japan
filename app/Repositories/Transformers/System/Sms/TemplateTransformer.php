<?php

namespace App\Repositories\Transformers\System\Sms;

use League\Fractal\TransformerAbstract;
use App\Models\System\Sms\Template;

/**
 * Class TemplateTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Sms;
 */
class TemplateTransformer extends TransformerAbstract
{
    /**
     * Transform the Template entity.
     *
     * @param \App\Models\System\Sms\Template $model
     *
     * @return array
     */
    public function transform(Template $model)
    {
        return [
            'id' => (int)$model->id,
            'belong' => $model->belong,
            'code' => $model->code,
            'name' => $model->name,
            'template_no' => $model->template_no,
            'template_sign' => $model->template_sign,
            'param' => $model->param,
            'created_at' => $model->created_at,
        ];
    }
}
