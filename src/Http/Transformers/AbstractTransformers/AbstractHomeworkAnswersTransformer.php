<?php

namespace NextDeveloper\LMS\Http\Transformers\AbstractTransformers;

use NextDeveloper\LMS\Database\Models\HomeworkAnswers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class HomeworkAnswersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class AbstractHomeworkAnswersTransformer extends AbstractTransformer
{

    /**
     * @param HomeworkAnswers $model
     *
     * @return array
     */
    public function transform(HomeworkAnswers $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                    $lmsHomeworkId = \NextDeveloper\LMS\Database\Models\Homework::where('id', $model->lms_homework_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'lms_homework_id'  =>  $lmsHomeworkId ? $lmsHomeworkId->uuid : null,
            'answer'  =>  $model->answer,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE




}
