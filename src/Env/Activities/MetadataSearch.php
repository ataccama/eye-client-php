<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Nette\SmartObject;


    /**
     * Class MetadataSearch
     * @package Ataccama\Eye\Client\Env\Activities
     * @property-read string|null $key
     * @property-read string      $value
     */
    class MetadataSearch
    {
        use SmartObject;

        /** @var string */
        private $value;

        /** @var string|null */
        private $key;

        /**
         * MetadataSearch constructor.
         * @param string      $value
         * @param string|null $key
         */
        public function __construct(string $value, ?string $key)
        {
            $this->value = $value;
            $this->key = $key;
        }

        /**
         * @return string
         */
        public function getValue(): string
        {
            return $this->value;
        }

        /**
         * @return string|null
         */
        public function getKey(): ?string
        {
            return $this->key;
        }
    }