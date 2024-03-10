<?php

namespace NextDeveloper\LMS\Http\Requests\UserTests;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class UserTestsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'lms_test_id' => 'nullable|exists:lms_tests,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}