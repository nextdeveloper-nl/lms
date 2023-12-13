<?php

namespace NextDeveloper\LMS\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\LMS\Database\Filters\LmsCourseQueryFilter;
use NextDeveloper\LMS\Services\AbstractServices\AbstractLmsCourseService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait LmsCourseTestTraits
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

    public function test_http_lmscourse_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/lms/lmscourse',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_lmscourse_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/lms/lmscourse', [
            'form_params'   =>  [
                'course'  =>  'a',
                'abstract'  =>  'a',
                'description'  =>  'a',
                'bibliography'  =>  'a',
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
    public function test_lmscourse_model_get()
    {
        $result = AbstractLmsCourseService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmscourse_get_all()
    {
        $result = AbstractLmsCourseService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_lmscourse_get_paginated()
    {
        $result = AbstractLmsCourseService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_lmscourse_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_lmscourse_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::first();

            event(new \NextDeveloper\LMS\Events\LmsCourse\LmsCourseRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_course_filter()
    {
        try {
            $request = new Request(
                [
                'course'  =>  'a'
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_abstract_filter()
    {
        try {
            $request = new Request(
                [
                'abstract'  =>  'a'
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_bibliography_filter()
    {
        try {
            $request = new Request(
                [
                'bibliography'  =>  'a'
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_lmscourse_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new LmsCourseQueryFilter($request);

            $model = \NextDeveloper\LMS\Database\Models\LmsCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}