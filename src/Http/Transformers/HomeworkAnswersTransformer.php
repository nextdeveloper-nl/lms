<?php

namespace NextDeveloper\LMS\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\LMS\Database\Models\HomeworkAnswers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\LMS\Http\Transformers\AbstractTransformers\AbstractHomeworkAnswersTransformer;

/**
 * Class HomeworkAnswersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class HomeworkAnswersTransformer extends AbstractHomeworkAnswersTransformer
{

    /**
     * @param HomeworkAnswers $model
     *
     * @return array
     */
    public function transform(HomeworkAnswers $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('HomeworkAnswers', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('HomeworkAnswers', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
