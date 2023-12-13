<?php

namespace NextDeveloper\LMS\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\LMS\Database\Filters\LmsHomeworkAnswerQueryFilter;
use NextDeveloper\LMS\Services\AbstractServices\AbstractLmsHomeworkAnswerService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait LmsHomeworkAnswerTestTraits
{
    public $http;

    /**
     *   Creating the Guzzle object
     */
    public function setupGuzzle()
    {
        $this->http = new Client(
            [
            'base_uri'  =>  '127.0.0.1:8000'
            ]
        );
    }

    /**
     *   Destroying the Guzzle object
     */
    public function destroyGuzzle()
    {
        $this->http = null;
    }

    public function test_http_lmshomeworkanswer_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/lms/lmshomeworkanswer',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_lmshomeworkanswer_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/lms/lmshomeworkanswer', [
            'form_params'   =>  [
                'answer'  =>  'a',
                            ],
                ['http_errors' => false]
            ]
        );

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);
    }

    /**
     * Get test
     *
     * @return bool
     */
    public function test_lmshomeworkanswer_model_get()
    {
        $result = AbstractLmsHomeworkAnswerService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmshomeworkanswer_get_all()
    {
        $result = AbstractLmsHomeworkAnswerService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmshomeworkanswer_get_paginated()
    {
        $result = AbstractLmsHomeworkAnswerService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_lmshomeworkanswer_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmshomeworkanswer_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsHomeworkAnswer\LmsHomeworkAnswerRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_answer_filter()
    {
        try {
            $request = new Request(
                [
                'answer'  =>  'a'
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmshomeworkanswer_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsHomeworkAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsHomeworkAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}