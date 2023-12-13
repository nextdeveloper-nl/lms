<?php

namespace NextDeveloper\LMS\Events\Questions;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\LMS\Database\Models\Questions;

/**
 * Class sQuestionsUpdatedEvent
 *
 * @package NextDeveloper\LMS\Events
 */
class sQuestionsUpdatedEvent
{
    use SerializesModels;

    /**
     * @var Questions
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(Questions $model = null)
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