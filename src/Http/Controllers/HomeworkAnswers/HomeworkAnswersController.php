<?php

namespace NextDeveloper\LMS\Http\Controllers\HomeworkAnswers;

use Illuminate\Http\Request;
use NextDeveloper\LMS\Http\Controllers\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\LMS\Http\Requests\HomeworkAnswers\HomeworkAnswersUpdateRequest;
use NextDeveloper\LMS\Database\Filters\HomeworkAnswersQueryFilter;
use NextDeveloper\LMS\Database\Models\HomeworkAnswers;
use NextDeveloper\LMS\Services\HomeworkAnswersService;
use NextDeveloper\LMS\Http\Requests\HomeworkAnswers\HomeworkAnswersCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class HomeworkAnswersController extends AbstractController
{
    private $model = HomeworkAnswers::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of homeworkanswers.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  HomeworkAnswersQueryFilter $filter  An object that builds search query
     * @param  Request                    $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(HomeworkAnswersQueryFilter $filter, Request $request)
    {
        $data = HomeworkAnswersService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $homeworkAnswersId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = HomeworkAnswersService::getByRef($ref);

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
        $objects = HomeworkAnswersService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created HomeworkAnswers object on database.
     *
     * @param  HomeworkAnswersCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(HomeworkAnswersCreateRequest $request)
    {
        $model = HomeworkAnswersService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates HomeworkAnswers object on database.
     *
     * @param  $homeworkAnswersId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($homeworkAnswersId, HomeworkAnswersUpdateRequest $request)
    {
        $model = HomeworkAnswersService::update($homeworkAnswersId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates HomeworkAnswers object on database.
     *
     * @param  $homeworkAnswersId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($homeworkAnswersId)
    {
        $model = HomeworkAnswersService::delete($homeworkAnswersId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
