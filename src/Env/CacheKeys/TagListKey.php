<?php

    namespace Env\Tags;

    use Ataccama\Common\Utils\Cache\IKey;


    /**
     * Class TagListKey
     * @package Env\Tags
     */
    final class TagListKey implements IKey
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
            return "eye_api_tags";
        }
    }