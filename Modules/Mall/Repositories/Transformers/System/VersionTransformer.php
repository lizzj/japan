<?php

namespace Modules\Mall\Repositories\Transformers\System;

use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\System\Version;


class VersionTransformer extends TransformerAbstract
{
    public function transform(Version $model)
    {
        return [
            'id' => (int)$model->id,
            'version' => $model->version,
            'log' => $model->log,
            'log_lang' => $this->processLog($model->log),
            'platform' => $model->platform,
            'platform_lang' => $this->processPlatform($model->platform),
            'force' => $model->force,
            'url' => config('mall.url') . $model->url,
            'status' => $model->status,
            'release' => $model->release,
            'created_at' => $model->created_at,
        ];
    }

    public function processPlatform($data)
    {
        return Lang::get('mall::General/Option.System.Version.Platform.' . $data);
    }

    public function processLog($data)
    {
        $result = [];
        for ($i = 0, $iMax = count($data); $i < $iMax; $i++) {
            $result[$i] = $data[$i]['option'];
        }
        return $result;
    }
}
