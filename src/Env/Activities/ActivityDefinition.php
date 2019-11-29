<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\IEntry;
    use Ataccama\Eye\Client\Env\Tags\TagList;
    use Nette\SmartObject;


    /**
     * Class ActivityDefinition
     * @package Ataccama\Eye\Env\Activities
     * @property-read IEntry      $session
     * @property-read Type        $type
     * @property-read string|null $ipAddress
     */
    class ActivityDefinition
    {
        use SmartObject;

        /** @var IEntry */
        protected $session;

        /** @var Type */
        protected $type;

        /** @var string|null */
        protected $ipAddress;

        /** @var TagList */
        public $tags;

        /**
         * ActivityDefinition constructor.
         * @param IEntry $session
         * @param Type   $type
         * @param string $ipAddress
         */
        public function __construct(IEntry $session, Type $type, string $ipAddress = null)
        {
            $this->session = $session;
            $this->type = $type;
            $this->ipAddress = $ipAddress;
            $this->tags = new TagList();
        }

        /**
         * @return IEntry
         */
        public function getSession(): IEntry
        {
            return $this->session;
        }

        /**
         * @return Type
         */
        public function getType(): Type
        {
            return $this->type;
        }

        /**
         * @return string|null
         */
        public function getIpAddress(): ?string
        {
            return $this->ipAddress;
        }
    }