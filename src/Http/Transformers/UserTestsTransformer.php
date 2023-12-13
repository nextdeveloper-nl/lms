<?php

namespace NextDeveloper\LMS\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\LMS\Database\Models\UserTests;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\LMS\Http\Transformers\AbstractTransformers\AbstractUserTestsTransformer;

/**
 * Class UserTestsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class UserTestsTransformer extends AbstractUserTestsTransformer
{

    /**
     * @param UserTests $model
     *
     * @return array
     */
    public function transform(UserTests $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('UserTests', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('UserTests', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
