<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class ActivityTypeList
     * @package Ataccama\Eye\Client\Env\Activities
     */
    class ActivityTypeList extends BaseArray
    {
        /**
         * @param Type $type
         */
        public function add($type): void
        {
            $this->items[$type->getKey()] = $type->getValue();
        }

        /**
         * @return Type
         */
        public function current(): Type
        {
            return parent::current();
        }

    }