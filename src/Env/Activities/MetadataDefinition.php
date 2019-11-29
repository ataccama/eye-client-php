<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\Pair;
    use Nette\SmartObject;


    /**
     * Class MetadataDefinition
     * @package Ataccama\Eye\Env\Activities
     * @property-read IEntry $activity
     */
    class MetadataDefinition extends Pair
    {
        use SmartObject;

        /**
         * MetadataDefinition constructor.
         * @param string $key
         * @param string $value
         */
        public function __construct(string $key, string $value)
        {
            parent::__construct($key, $value);
        }
    }