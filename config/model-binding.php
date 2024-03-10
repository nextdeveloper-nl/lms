<?php

return [
    'lmshomeworkanswer' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::findByRef($value);
    },

'lmshomework' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsHomework::findByRef($value);
},

'lmsquestion' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsQuestion::findByRef($value);
},

'lmsanswer' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsAnswer::findByRef($value);
},

'lmstest' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsTest::findByRef($value);
},

'lmsusertest' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsUserTest::findByRef($value);
},

'lmscourse' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsCourse::findByRef($value);
},

'lmshomeworkanswer' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::findByRef($value);
},

'lmshomework' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsHomework::findByRef($value);
},

'lmsquestion' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsQuestion::findByRef($value);
},

'lmsanswer' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsAnswer::findByRef($value);
},

'lmstest' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsTest::findByRef($value);
},

'lmsusertest' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsUserTest::findByRef($value);
},

'lmscourse' => function ($value) {
        return NextDeveloper\LMS\Database\Models\LmsCourse::findByRef($value);
},

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
];