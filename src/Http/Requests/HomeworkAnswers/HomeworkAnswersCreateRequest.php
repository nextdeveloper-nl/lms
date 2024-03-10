<?php

namespace NextDeveloper\LMS\Http\Requests\HomeworkAnswers;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HomeworkAnswersCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'lms_homework_id' => 'required|exists:lms_homeworks,uuid|uuid',
        'answer' => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}