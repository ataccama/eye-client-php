<?php

    namespace Ataccama\Eye\Client\Env\CacheKeys;

    use Ataccama\Common\Utils\Cache\IKey;
    use Ataccama\Eye\Client\Env\Activities\Filter;


    /**
     * Class ActivityListKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    class ActivityListKey implements IKey
    {
        /** @var string */
        private $id;

        /**
         * ActivityListKey constructor.
         * @param Filter $filter
         */
        public function __construct(Filter $filter)
        {
            $this->id = "$filter";
        }

        public function getId()
        {
            return $this->id;
        }

        public function getPrefix(): ?string
        {
            return "eye_api_activities";
        }
    }