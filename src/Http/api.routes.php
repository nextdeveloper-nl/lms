<?php

Route::prefix('lms')->group(
    function () {
        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
        Route::prefix('courses')->group(
            function () {
                Route::get('/', 'Courses\CoursesController@index');

                Route::get('{lms_courses}/tags ', 'Courses\CoursesController@tags');
                Route::post('{lms_courses}/tags ', 'Courses\CoursesController@saveTags');
                Route::get('{lms_courses}/addresses ', 'Courses\CoursesController@addresses');
                Route::post('{lms_courses}/addresses ', 'Courses\CoursesController@saveAddresses');

                Route::get('/{lms_courses}/{subObjects}', 'Courses\CoursesController@relatedObjects');
                Route::get('/{lms_courses}', 'Courses\CoursesController@show');

                Route::post('/', 'Courses\CoursesController@store');
                Route::patch('/{lms_courses}', 'Courses\CoursesController@update');
                Route::delete('/{lms_courses}', 'Courses\CoursesController@destroy');
            }
        );
    }
);



