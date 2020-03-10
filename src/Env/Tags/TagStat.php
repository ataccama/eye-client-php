<?php


    namespace Env\Tags;

    use Ataccama\Common\Env\IPair;
    use Ataccama\Common\Utils\Comparator\Comparable;
    use Nette\SmartObject;


    /**
     * Class TagCount
     * @package Env\Tags
     * @property-read string $name
     * @property-read int    $count
     */
    class TagStat implements Comparable, IPair
    {
        use SmartObject;

        /** @var string */
        protected $name;

        /** @var int */
        protected $count;

        /**
         * TagStat constructor.
         * @param string $name
         * @param int    $count
         */
        public function __construct(string $name, int $count = 0)
        {
            $this->name = $name;
            $this->count = $count;
        }

        public function getValue(): int
        {
            return $this->count;
        }

        public function getKey()
        {
            return $this->name;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return int
         */
        public function getCount(): int
        {
            return $this->count;
        }
    }