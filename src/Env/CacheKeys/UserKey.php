<?php

    namespace Ataccama\Eye\Client\Env\CacheKeys;


    use Ataccama\Common\Utils\Cache\IKey;
    use Ataccama\Eye\Client\Env\Users\Filter;


    /**
     * Class UserKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    class UserKey implements IKey
    {
        /** @var string */
        private $id;

        /**
         * UserKey constructor.
         * @param Filter $filter
         */
        public function __construct(Filter $filter)
        {
            $this->id = "$filter";
        }

        public function getPrefix(): ?string
        {
            return "eye_api_user";
        }

        public function getId()
        {
            return $this->id;
        }
    }