<?php

namespace NextDeveloper\LMS\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\LMS\Database\Filters\LmsUserTestQueryFilter;
use NextDeveloper\LMS\Services\AbstractServices\AbstractLmsUserTestService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait LmsUserTestTestTraits
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

    public function test_http_lmsusertest_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/lms/lmsusertest',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_lmsusertest_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/lms/lmsusertest', [
            'form_params'   =>  [
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
    public function test_lmsusertest_model_get()
    {
        $result = AbstractLmsUserTestService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmsusertest_get_all()
    {
        $result = AbstractLmsUserTestService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmsusertest_get_paginated()
    {
        $result = AbstractLmsUserTestService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_lmsusertest_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmsusertest_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::first();

            event(new \NextDeveloper\LMS\Events\LmsUserTest\LmsUserTestRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmsusertest_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsUserTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsUserTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}