<?php

    namespace Ataccama\Eye\Client\Env\Tags;


    /**
     * Class TagDefinition
     * @package Ataccama\Eye\Env\Tags
     */
    class TagDefinition
    {
        /** @var string */
        public $name;

        /**
         * TagDefinition constructor.
         * @param string $name
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }
    }