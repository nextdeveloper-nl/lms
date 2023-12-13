<?php

namespace NextDeveloper\LMS\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\LMS\Database\Models\Answers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\LMS\Http\Transformers\AbstractTransformers\AbstractAnswersTransformer;

/**
 * Class AnswersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class AnswersTransformer extends AbstractAnswersTransformer
{

    /**
     * @param Answers $model
     *
     * @return array
     */
    public function transform(Answers $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Answers', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Answers', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
