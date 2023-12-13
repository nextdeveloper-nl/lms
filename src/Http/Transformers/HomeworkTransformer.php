<?php

namespace NextDeveloper\LMS\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\LMS\Database\Models\Homework;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\LMS\Http\Transformers\AbstractTransformers\AbstractHomeworkTransformer;

/**
 * Class HomeworkTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class HomeworkTransformer extends AbstractHomeworkTransformer
{

    /**
     * @param Homework $model
     *
     * @return array
     */
    public function transform(Homework $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Homework', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Homework', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
