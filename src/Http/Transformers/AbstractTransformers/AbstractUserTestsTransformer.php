<?php

namespace NextDeveloper\LMS\Http\Transformers\AbstractTransformers;

use NextDeveloper\LMS\Database\Models\UserTests;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class UserTestsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class AbstractUserTestsTransformer extends AbstractTransformer
{

    /**
     * @param UserTests $model
     *
     * @return array
     */
    public function transform(UserTests $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                    $lmsTestId = \NextDeveloper\LMS\Database\Models\Tests::where('id', $model->lms_test_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'lms_test_id'  =>  $lmsTestId ? $lmsTestId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


}
