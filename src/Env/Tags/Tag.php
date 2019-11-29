<?php

    namespace Ataccama\Eye\Client\Env\Tags;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\IEntry;


    /**
     * Class Tag
     * @package Ataccama\Eye\Env\Tags
     */
    class Tag extends TagDefinition implements IEntry, IArray
    {
        use BaseEntry;

        /**
         * Tag constructor.
         * @param int    $id
         * @param string $name
         */
        public function __construct(int $id, string $name)
        {
            parent::__construct($name);
            $this->id = $id;
        }

        public function toArray(): array
        {
            return [
                "id"   => $this->id,
                "name" => $this->name
            ];
        }
    }