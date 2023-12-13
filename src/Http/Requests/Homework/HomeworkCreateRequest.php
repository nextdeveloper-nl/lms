<?php

namespace NextDeveloper\LMS\Http\Requests\Homework;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HomeworkCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'lms_question_id' => 'required|exists:lms_questions,uuid|uuid',
        'name'            => 'required|string|max:500',
        'abstract'        => 'required|string',
        'homework'        => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}