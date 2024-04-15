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

class LmsAdminRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'lms-admin';

    public const LEVEL = 100;

    public const DESCRIPTION = 'LMS Admin';

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
            'lms_answers:update',
            'lms_answers:create',
            'lms_answers:delete',
            'lms_courses:read',
            'lms_courses:update',
            'lms_courses:create',
            'lms_courses:delete',
            'lms_homework:read',
            'lms_homework:update',
            'lms_homework:create',
            'lms_homework:delete',
            'lms_homework_answers:read',
            'lms_homework_answers:update',
            'lms_homework_answers:create',
            'lms_homework_answers:delete',
            'lms_questions:read',
            'lms_questions:update',
            'lms_questions:create',
            'lms_questions:delete',
            'lms_tests:read',
            'lms_tests:update',
            'lms_tests:create',
            'lms_tests:delete',
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
