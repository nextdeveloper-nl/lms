<?php

namespace NextDeveloper\LMS\Http\Requests\Courses;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class CoursesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'course' => 'nullable|string',
        'abstract' => 'nullable|string',
        'description' => 'nullable|string',
        'bibliography' => 'nullable|string',
        'common_category_id' => 'nullable|exists:common_categories,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}