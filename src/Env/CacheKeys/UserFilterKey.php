<?php

    namespace Ataccama\Eye\Client\Env\CacheKeys;

    use Ataccama\Common\Utils\Cache\IKey;
    use Ataccama\Eye\Client\Env\Users\Filter;


    /**
     * Class UserFilterKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    class UserFilterKey implements IKey
    {
        /** @var string */
        private $id;

        const PREFIX = "eye_api_user_filter";

        /**
         * UserFilterKey constructor.
         * @param Filter $filter
         */
        public function __construct(Filter $filter)
        {
            if (!empty($filter->email)) {
                $this->id = $filter->email;
            } elseif (!empty($filter->session)) {
                $this->id = $filter->session->id;
            } elseif (!empty($filter->keycloakId)) {
                $this->id = $filter->keycloakId;
            }
        }

        public function getId()
        {
            return $this->id;
        }

        public function getPrefix(): ?string
        {
            return self::PREFIX;
        }
    }