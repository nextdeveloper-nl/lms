<?php

namespace NextDeveloper\LMS\Http\Controllers\Homework;

use Illuminate\Http\Request;
use NextDeveloper\LMS\Http\Controllers\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\LMS\Http\Requests\Homework\HomeworkUpdateRequest;
use NextDeveloper\LMS\Database\Filters\HomeworkQueryFilter;
use NextDeveloper\LMS\Database\Models\Homework;
use NextDeveloper\LMS\Services\HomeworkService;
use NextDeveloper\LMS\Http\Requests\Homework\HomeworkCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class HomeworkController extends AbstractController
{
    private $model = Homework::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of homework.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  HomeworkQueryFilter $filter  An object that builds search query
     * @param  Request             $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(HomeworkQueryFilter $filter, Request $request)
    {
        $data = HomeworkService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $homeworkId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = HomeworkService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method returns the list of sub objects the related object. Sub object means an object which is preowned by
     * this object.
     *
     * It can be tags, addresses, states etc.
     *
     * @param  $ref
     * @param  $subObject
     * @return void
     */
    public function relatedObjects($ref, $subObject)
    {
        $objects = HomeworkService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created Homework object on database.
     *
     * @param  HomeworkCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(HomeworkCreateRequest $request)
    {
        $model = HomeworkService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Homework object on database.
     *
     * @param  $homeworkId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($homeworkId, HomeworkUpdateRequest $request)
    {
        $model = HomeworkService::update($homeworkId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Homework object on database.
     *
     * @param  $homeworkId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($homeworkId)
    {
        $model = HomeworkService::delete($homeworkId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
