<?php

namespace NextDeveloper\LMS\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\LMS\Database\Models\Questions;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\LMS\Http\Transformers\AbstractTransformers\AbstractQuestionsTransformer;

/**
 * Class QuestionsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class QuestionsTransformer extends AbstractQuestionsTransformer
{

    /**
     * @param Questions $model
     *
     * @return array
     */
    public function transform(Questions $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Questions', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Questions', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
