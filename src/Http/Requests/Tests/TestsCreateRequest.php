<?php

namespace NextDeveloper\LMS\Http\Requests\Tests;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class TestsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'abstract' => 'nullable|string',
        'description' => 'nullable|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}