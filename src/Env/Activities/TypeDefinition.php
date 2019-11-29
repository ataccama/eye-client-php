<?php

    namespace Ataccama\Eye\Client\Env\Activities;


    /**
     * Class ActivityTypeDefinition
     * @package Ataccama\Eye\Env\Activities
     */
    class TypeDefinition
    {
        /** @var string */
        public $name;

        /**
         * ActivityTypeDefinition constructor.
         * @param string $name
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }
    }