<?php

namespace NextDeveloper\LMS\Events\Tests;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\LMS\Database\Models\Tests;

/**
 * Class sTestsSavingEvent
 *
 * @package NextDeveloper\LMS\Events
 */
class sTestsSavingEvent
{
    use SerializesModels;

    /**
     * @var Tests
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(Tests $model = null)
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