<?php

namespace NextDeveloper\LMS\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\LMS\Database\Models\Tests;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\LMS\Http\Transformers\AbstractTransformers\AbstractTestsTransformer;

/**
 * Class TestsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class TestsTransformer extends AbstractTestsTransformer
{

    /**
     * @param Tests $model
     *
     * @return array
     */
    public function transform(Tests $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Tests', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Tests', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
