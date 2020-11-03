<?php
    declare(strict_types=1);

    namespace Env\CacheKeys;

    use Ataccama\Common\Utils\Cache\IKey;


    /**
     * Class ConsentTypesKey
     * @package Env\CacheKeys
     */
    class ConsentTypesKey implements IKey
    {
        /** @var string */
        private $id;

        /**
         * ActivityListKey constructor.
         */
        public function __construct()
        {
            $this->id = "all";
        }

        public function getId()
        {
            return $this->id;
        }

        public function getPrefix(): ?string
        {
            return "eye_api_consent_types";
        }
    }