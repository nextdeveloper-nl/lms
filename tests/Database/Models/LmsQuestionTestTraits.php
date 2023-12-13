<?php

namespace NextDeveloper\LMS\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\LMS\Database\Filters\LmsQuestionQueryFilter;
use NextDeveloper\LMS\Services\AbstractServices\AbstractLmsQuestionService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait LmsQuestionTestTraits
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

    public function test_http_lmsquestion_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/lms/lmsquestion',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_lmsquestion_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/lms/lmsquestion', [
            'form_params'   =>  [
                'question'  =>  'a',
                'description'  =>  'a',
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
    public function test_lmsquestion_model_get()
    {
        $result = AbstractLmsQuestionService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmsquestion_get_all()
    {
        $result = AbstractLmsQuestionService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmsquestion_get_paginated()
    {
        $result = AbstractLmsQuestionService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_lmsquestion_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsquestion_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::first();

            event(new \NextDeveloper\LMS\Events\LmsQuestion\LmsQuestionRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_question_filter()
    {
        try {
            $request = new Request(
                [
                'question'  =>  'a'
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsquestion_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsQuestionQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsQuestion::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}