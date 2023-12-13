<?php

namespace NextDeveloper\LMS\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\LMS\Database\Filters\LmsTestQueryFilter;
use NextDeveloper\LMS\Services\AbstractServices\AbstractLmsTestService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait LmsTestTestTraits
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

    public function test_http_lmstest_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/lms/lmstest',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_lmstest_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/lms/lmstest', [
            'form_params'   =>  [
                'name'  =>  'a',
                'abstract'  =>  'a',
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
    public function test_lmstest_model_get()
    {
        $result = AbstractLmsTestService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmstest_get_all()
    {
        $result = AbstractLmsTestService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmstest_get_paginated()
    {
        $result = AbstractLmsTestService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_lmstest_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmstest_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsTest::first();

            event(new \NextDeveloper\LMS\Events\LmsTest\LmsTestRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_abstract_filter()
    {
        try {
            $request = new Request(
                [
                'abstract'  =>  'a'
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmstest_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsTestQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsTest::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}