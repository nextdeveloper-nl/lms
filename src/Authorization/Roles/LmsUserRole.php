<?php

namespace NextDeveloper\LMS\Authorization\Roles;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use NextDeveloper\CRM\Database\Models\AccountManagers;
use NextDeveloper\IAM\Authorization\Roles\AbstractRole;
use NextDeveloper\IAM\Authorization\Roles\IAuthorizationRole;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Helpers\UserHelper;

class LmsUserRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'lms-user';

    public const LEVEL = 150;

    public const DESCRIPTION = 'Learning management system basic user role. This role allows user to see items in the LMS service.';

    public const DB_PREFIX = 'lms';

    /**
     * Applies basic member role sql for Eloquent
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        /**
         * Here user will be able to list all models, because by default, sales manager can see everybody.
         */
    }

    public function checkPrivileges(Users $users = null)
    {
        //return UserHelper::hasRole(self::NAME, $users);
    }

    public function getModule()
    {
        return 'lms';
    }

    public function allowedOperations() :array
    {
        return [
            'lms_answers:read',
            'lms_courses:read',
            'lms_homework:read',
            'lms_homework:update',
            'lms_homework:create',
            'lms_homework_answers:read',
            'lms_homework_answers:update',
            'lms_homework_answers:create',
            'lms_questions:read',
            'lms_tests:read',
            'lms_user_tests:read',
            'lms_user_tests:update',
            'lms_user_tests:create',
            'lms_user_tests:delete'
        ];
    }

    public function getLevel(): int
    {
        return self::LEVEL;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function canBeApplied($column)
    {
        if(self::DB_PREFIX === '*') {
            return true;
        }

        if(Str::startsWith($column, self::DB_PREFIX)) {
            return true;
        }

        return false;
    }

    public function getDbPrefix()
    {
        return self::DB_PREFIX;
    }
}
