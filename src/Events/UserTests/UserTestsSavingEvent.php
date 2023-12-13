<?php

namespace NextDeveloper\LMS\Events\UserTests;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\LMS\Database\Models\UserTests;

/**
 * Class sUserTestsSavingEvent
 *
 * @package NextDeveloper\LMS\Events
 */
class sUserTestsSavingEvent
{
    use SerializesModels;

    /**
     * @var UserTests
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(UserTests $model = null)
    {
        $this->_model = $model;
    }

    /**
     * @param int $value
     *
     * @return AbstractEvent
     */
    public function setTimestamp($value)
    {
        $this->timestamp = $value;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}