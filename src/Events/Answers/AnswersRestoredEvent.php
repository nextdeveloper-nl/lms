<?php

namespace NextDeveloper\LMS\Events\Answers;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\LMS\Database\Models\Answers;

/**
 * Class sAnswersRestoredEvent
 *
 * @package NextDeveloper\LMS\Events
 */
class sAnswersRestoredEvent
{
    use SerializesModels;

    /**
     * @var Answers
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(Answers $model = null)
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