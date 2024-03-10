<?php

namespace NextDeveloper\LMS\Http\Requests\Homework;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HomeworkUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'abstract' => 'nullable|string',
        'homework' => 'nullable|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}