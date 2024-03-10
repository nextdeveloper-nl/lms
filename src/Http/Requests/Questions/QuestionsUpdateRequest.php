<?php

namespace NextDeveloper\LMS\Http\Requests\Questions;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class QuestionsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'lms_test_id' => 'nullable|exists:lms_tests,uuid|uuid',
        'question' => 'nullable|string',
        'description' => 'nullable|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}