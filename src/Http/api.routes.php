<?php

Route::prefix('lms')->group(function () {
    Route::prefix('answers')->group(
        function () {
            Route::get('/', 'Answers\AnswersController@index');

            Route::get('{lms_answers}/tags ', 'Answers\AnswersController@tags');
            Route::post('{lms_answers}/tags ', 'Answers\AnswersController@saveTags');
            Route::get('{lms_answers}/addresses ', 'Answers\AnswersController@addresses');
            Route::post('{lms_answers}/addresses ', 'Answers\AnswersController@saveAddresses');

            Route::get('/{lms_answers}/{subObjects}', 'Answers\AnswersController@relatedObjects');
            Route::get('/{lms_answers}', 'Answers\AnswersController@show');

            Route::post('/', 'Answers\AnswersController@store');
            Route::patch('/{lms_answers}', 'Answers\AnswersController@update');
            Route::delete('/{lms_answers}', 'Answers\AnswersController@destroy');
        }
    );

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

    Route::prefix('homework')->group(
        function () {
            Route::get('/', 'Homework\HomeworkController@index');

            Route::get('{lms_homework}/tags ', 'Homework\HomeworkController@tags');
            Route::post('{lms_homework}/tags ', 'Homework\HomeworkController@saveTags');
            Route::get('{lms_homework}/addresses ', 'Homework\HomeworkController@addresses');
            Route::post('{lms_homework}/addresses ', 'Homework\HomeworkController@saveAddresses');

            Route::get('/{lms_homework}/{subObjects}', 'Homework\HomeworkController@relatedObjects');
            Route::get('/{lms_homework}', 'Homework\HomeworkController@show');

            Route::post('/', 'Homework\HomeworkController@store');
            Route::patch('/{lms_homework}', 'Homework\HomeworkController@update');
            Route::delete('/{lms_homework}', 'Homework\HomeworkController@destroy');
        }
    );

    Route::prefix('homework-answers')->group(
        function () {
            Route::get('/', 'HomeworkAnswers\HomeworkAnswersController@index');

            Route::get('{lms_homework_answers}/tags ', 'HomeworkAnswers\HomeworkAnswersController@tags');
            Route::post('{lms_homework_answers}/tags ', 'HomeworkAnswers\HomeworkAnswersController@saveTags');
            Route::get('{lms_homework_answers}/addresses ', 'HomeworkAnswers\HomeworkAnswersController@addresses');
            Route::post('{lms_homework_answers}/addresses ', 'HomeworkAnswers\HomeworkAnswersController@saveAddresses');

            Route::get('/{lms_homework_answers}/{subObjects}', 'HomeworkAnswers\HomeworkAnswersController@relatedObjects');
            Route::get('/{lms_homework_answers}', 'HomeworkAnswers\HomeworkAnswersController@show');

            Route::post('/', 'HomeworkAnswers\HomeworkAnswersController@store');
            Route::patch('/{lms_homework_answers}', 'HomeworkAnswers\HomeworkAnswersController@update');
            Route::delete('/{lms_homework_answers}', 'HomeworkAnswers\HomeworkAnswersController@destroy');
        }
    );

    Route::prefix('questions')->group(
        function () {
            Route::get('/', 'Questions\QuestionsController@index');

            Route::get('{lms_questions}/tags ', 'Questions\QuestionsController@tags');
            Route::post('{lms_questions}/tags ', 'Questions\QuestionsController@saveTags');
            Route::get('{lms_questions}/addresses ', 'Questions\QuestionsController@addresses');
            Route::post('{lms_questions}/addresses ', 'Questions\QuestionsController@saveAddresses');

            Route::get('/{lms_questions}/{subObjects}', 'Questions\QuestionsController@relatedObjects');
            Route::get('/{lms_questions}', 'Questions\QuestionsController@show');

            Route::post('/', 'Questions\QuestionsController@store');
            Route::patch('/{lms_questions}', 'Questions\QuestionsController@update');
            Route::delete('/{lms_questions}', 'Questions\QuestionsController@destroy');
        }
    );

    Route::prefix('tests')->group(
        function () {
            Route::get('/', 'Tests\TestsController@index');

            Route::get('{lms_tests}/tags ', 'Tests\TestsController@tags');
            Route::post('{lms_tests}/tags ', 'Tests\TestsController@saveTags');
            Route::get('{lms_tests}/addresses ', 'Tests\TestsController@addresses');
            Route::post('{lms_tests}/addresses ', 'Tests\TestsController@saveAddresses');

            Route::get('/{lms_tests}/{subObjects}', 'Tests\TestsController@relatedObjects');
            Route::get('/{lms_tests}', 'Tests\TestsController@show');

            Route::post('/', 'Tests\TestsController@store');
            Route::patch('/{lms_tests}', 'Tests\TestsController@update');
            Route::delete('/{lms_tests}', 'Tests\TestsController@destroy');
        }
    );

    Route::prefix('user-tests')->group(
        function () {
            Route::get('/', 'UserTests\UserTestsController@index');

            Route::get('{lms_user_tests}/tags ', 'UserTests\UserTestsController@tags');
            Route::post('{lms_user_tests}/tags ', 'UserTests\UserTestsController@saveTags');
            Route::get('{lms_user_tests}/addresses ', 'UserTests\UserTestsController@addresses');
            Route::post('{lms_user_tests}/addresses ', 'UserTests\UserTestsController@saveAddresses');

            Route::get('/{lms_user_tests}/{subObjects}', 'UserTests\UserTestsController@relatedObjects');
            Route::get('/{lms_user_tests}', 'UserTests\UserTestsController@show');

            Route::post('/', 'UserTests\UserTestsController@store');
            Route::patch('/{lms_user_tests}', 'UserTests\UserTestsController@update');
            Route::delete('/{lms_user_tests}', 'UserTests\UserTestsController@destroy');
        }
    );

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
});
