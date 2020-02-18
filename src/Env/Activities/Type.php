<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\IPair;


    /**
     * Class ActivityType
     * @package Ataccama\Eye\Env\Activities
     */
    class Type extends TypeDefinition implements IEntry, IPair, IArray
    {
        use BaseEntry;

        /**
         * ActivityType constructor.
         * @param int    $id
         * @param string $name
         */
        public function __construct(int $id, string $name)
        {
            parent::__construct($name);
            $this->id = $id;
        }

        public function getKey()
        {
            return $this->id;
        }

        public function getValue()
        {
            return $this->name;
        }

        public function toArray(): array
        {
            return [
                "id"   => $this->id,
                "name" => $this->name
            ];
        }
    }