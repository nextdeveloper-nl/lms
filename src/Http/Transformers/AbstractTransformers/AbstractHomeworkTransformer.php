<?php

namespace NextDeveloper\LMS\Http\Transformers\AbstractTransformers;

use NextDeveloper\LMS\Database\Models\Homework;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class HomeworkTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class AbstractHomeworkTransformer extends AbstractTransformer
{

    /**
     * @param Homework $model
     *
     * @return array
     */
    public function transform(Homework $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'name'  =>  $model->name,
            'abstract'  =>  $model->abstract,
            'homework'  =>  $model->homework,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE



}
