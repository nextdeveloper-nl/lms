<?php

namespace NextDeveloper\LMS\Http\Transformers\AbstractTransformers;

use NextDeveloper\LMS\Database\Models\Answers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class AnswersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\LMS\Http\Transformers
 */
class AbstractAnswersTransformer extends AbstractTransformer
{

    /**
     * @param Answers $model
     *
     * @return array
     */
    public function transform(Answers $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                    $lmsQuestionId = \NextDeveloper\LMS\Database\Models\Questions::where('id', $model->lms_question_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'lms_question_id'  =>  $lmsQuestionId ? $lmsQuestionId->uuid : null,
            'answers'  =>  $model->answers,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE




}
