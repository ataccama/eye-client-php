<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class MetadataList
     * @package Ataccama\Eye\Env\Activities
     */
    class MetadataList extends BaseArray
    {
        /**
         * @param Metadata $metadata
         */
        public function add($metadata)
        {
            parent::add($metadata);
        }

        /**
         * @return Metadata
         */
        public function current()
        {
            return parent::current();
        }

        public function toApiArray(): array
        {
            $data = [];
            foreach ($this as $metadata) {
                $data[] = $metadata->toArray();
            }

            return $data;
        }
    }