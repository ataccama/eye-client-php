<?php

    namespace Ataccama\Eye\Client\Mappers;

    /**
     * Class Mapper
     * @package Ataccama\Eye\Client\Mappers
     */
    abstract class Mapper
    {
        /** @var mixed */
        private $result;

        /**
         * Mapper constructor.
         * @param \stdClass $response
         */
        public function __construct(\stdClass $response)
        {
            $this->map($response, $this->result);
        }

        abstract protected function map($input, &$output);

        public function getObject()
        {
            return $this->result;
        }
    }