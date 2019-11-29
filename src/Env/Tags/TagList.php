<?php

    namespace Ataccama\Eye\Client\Env\Tags;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class TagList
     * @package Ataccama\Eye\Env\Tags
     */
    class TagList extends BaseArray
    {
        /**
         * @param Tag $tag
         */
        public function add($tag)
        {
            $this->items[$tag->id] = $tag;
        }

        /**
         * @return Tag
         */
        public function current(): Tag
        {
            return parent::current();
        }

        public function toArray(): array
        {
            $tags = [];
            foreach ($this as $tag) {
                $tags[] = $tag->toArray();
            }

            return $tags;
        }
    }