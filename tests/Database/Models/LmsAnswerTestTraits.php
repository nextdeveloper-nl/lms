<?php

namespace NextDeveloper\LMS\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\LMS\Database\Filters\LmsAnswerQueryFilter;
use NextDeveloper\LMS\Services\AbstractServices\AbstractLmsAnswerService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait LmsAnswerTestTraits
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

    public function test_http_lmsanswer_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/lms/lmsanswer',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_lmsanswer_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/lms/lmsanswer', [
            'form_params'   =>  [
                'answers'  =>  'a',
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
    public function test_lmsanswer_model_get()
    {
        $result = AbstractLmsAnswerService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmsanswer_get_all()
    {
        $result = AbstractLmsAnswerService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmsanswer_get_paginated()
    {
        $result = AbstractLmsAnswerService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_lmsanswer_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsanswer_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::first();

            event(new \NextDeveloper\LMS\Events\LmsAnswer\LmsAnswerRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_answers_filter()
    {
        try {
            $request = new Request(
                [
                'answers'  =>  'a'
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsanswer_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsAnswerQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsAnswer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}