<?php

namespace NextDeveloper\LMS\Http\Controllers\Questions;

use Illuminate\Http\Request;
use NextDeveloper\LMS\Http\Controllers\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\LMS\Http\Requests\Questions\QuestionsUpdateRequest;
use NextDeveloper\LMS\Database\Filters\QuestionsQueryFilter;
use NextDeveloper\LMS\Database\Models\Questions;
use NextDeveloper\LMS\Services\QuestionsService;
use NextDeveloper\LMS\Http\Requests\Questions\QuestionsCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class QuestionsController extends AbstractController
{
    private $model = Questions::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of questions.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  QuestionsQueryFilter $filter  An object that builds search query
     * @param  Request              $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(QuestionsQueryFilter $filter, Request $request)
    {
        $data = QuestionsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $questionsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = QuestionsService::getByRef($ref);

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
        $objects = QuestionsService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created Questions object on database.
     *
     * @param  QuestionsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(QuestionsCreateRequest $request)
    {
        $model = QuestionsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Questions object on database.
     *
     * @param  $questionsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($questionsId, QuestionsUpdateRequest $request)
    {
        $model = QuestionsService::update($questionsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Questions object on database.
     *
     * @param  $questionsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($questionsId)
    {
        $model = QuestionsService::delete($questionsId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
