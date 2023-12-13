<?php

namespace NextDeveloper\LMS\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Commons\Helpers\DatabaseHelper;
use NextDeveloper\LMS\Database\Models\HomeworkAnswers;
use NextDeveloper\LMS\Database\Filters\HomeworkAnswersQueryFilter;
use NextDeveloper\Commons\Exceptions\ModelNotFoundException;
use NextDeveloper\LMS\Events\HomeworkAnswers\HomeworkAnswersCreatedEvent;
use NextDeveloper\LMS\Events\HomeworkAnswers\HomeworkAnswersCreatingEvent;
use NextDeveloper\LMS\Events\HomeworkAnswers\HomeworkAnswersUpdatedEvent;
use NextDeveloper\LMS\Events\HomeworkAnswers\HomeworkAnswersUpdatingEvent;
use NextDeveloper\LMS\Events\HomeworkAnswers\HomeworkAnswersDeletedEvent;
use NextDeveloper\LMS\Events\HomeworkAnswers\HomeworkAnswersDeletingEvent;

/**
 * This class is responsible from managing the data for HomeworkAnswers
 *
 * Class HomeworkAnswersService.
 *
 * @package NextDeveloper\LMS\Database\Models
 */
class AbstractHomeworkAnswersService
{
    public static function get(HomeworkAnswersQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator
    {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null) {
            $filter = new HomeworkAnswersQueryFilter(new Request());
        }

        $perPage = config('commons.pagination.per_page');

        if($perPage == null) {
            $perPage = 20;
        }

        if(array_key_exists('per_page', $params)) {
            $perPage = intval($params['per_page']);

            if($perPage == 0) {
                $perPage = 20;
            }
        }

        if(array_key_exists('orderBy', $params)) {
            $filter->orderBy($params['orderBy']);
        }

        $model = HomeworkAnswers::filter($filter);

        if($model && $enablePaginate) {
            return $model->paginate($perPage);
        } else {
            return $model->get();
        }
    }

    public static function getAll()
    {
        return HomeworkAnswers::all();
    }

    /**
     * This method returns the model by looking at reference id
     *
     * @param  $ref
     * @return mixed
     */
    public static function getByRef($ref) : ?HomeworkAnswers
    {
        return HomeworkAnswers::findByRef($ref);
    }

    /**
     * This method returns the model by lookint at its id
     *
     * @param  $id
     * @return HomeworkAnswers|null
     */
    public static function getById($id) : ?HomeworkAnswers
    {
        return HomeworkAnswers::where('id', $id)->first();
    }

    /**
     * This method returns the sub objects of the related models
     *
     * @param  $uuid
     * @param  $object
     * @return void
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public static function relatedObjects($uuid, $object)
    {
        try {
            $obj = HomeworkAnswers::where('uuid', $uuid)->first();

            if(!$obj) {
                throw new ModelNotFoundException('Cannot find the related model');
            }

            if($obj) {
                return $obj->$object;
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * This method created the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function create(array $data)
    {
        event(new HomeworkAnswersCreatingEvent());

        if (array_key_exists('iam_account_id', $data)) {
            $data['iam_account_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Accounts',
                $data['iam_account_id']
            );
        }
        if (array_key_exists('iam_user_id', $data)) {
            $data['iam_user_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Users',
                $data['iam_user_id']
            );
        }
        if (array_key_exists('lms_homework_id', $data)) {
            $data['lms_homework_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\LMS\Database\Models\Homework',
                $data['lms_homework_id']
            );
        }
    
        try {
            $model = HomeworkAnswers::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        event(new HomeworkAnswersCreatedEvent($model));

        return $model->fresh();
    }

    /**
     This function expects the ID inside the object.
    
     @param  array $data
     @return HomeworkAnswers
     */
    public static function updateRaw(array $data) : ?HomeworkAnswers
    {
        if(array_key_exists('id', $data)) {
            return self::update($data['id'], $data);
        }

        return null;
    }

    /**
     * This method updated the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function update($id, array $data)
    {
        $model = HomeworkAnswers::where('uuid', $id)->first();

        if (array_key_exists('iam_account_id', $data)) {
            $data['iam_account_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Accounts',
                $data['iam_account_id']
            );
        }
        if (array_key_exists('iam_user_id', $data)) {
            $data['iam_user_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Users',
                $data['iam_user_id']
            );
        }
        if (array_key_exists('lms_homework_id', $data)) {
            $data['lms_homework_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\LMS\Database\Models\Homework',
                $data['lms_homework_id']
            );
        }
    
        event(new HomeworkAnswersUpdatingEvent($model));

        try {
            $isUpdated = $model->update($data);
            $model = $model->fresh();
        } catch(\Exception $e) {
            throw $e;
        }

        event(new HomeworkAnswersUpdatedEvent($model));

        return $model->fresh();
    }

    /**
     * This method updated the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function delete($id)
    {
        $model = HomeworkAnswers::where('uuid', $id)->first();

        event(new HomeworkAnswersDeletingEvent());

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
