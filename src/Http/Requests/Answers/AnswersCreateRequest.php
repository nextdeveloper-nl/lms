<?php

namespace NextDeveloper\LMS\Http\Requests\Answers;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AnswersCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'lms_question_id' => 'required|exists:lms_questions,uuid|uuid',
        'answers'         => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}