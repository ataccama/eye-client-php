<?php

    namespace Ataccama\Eye\Client\Env\Sessions;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\Person;


    /**
     * Class MinifiedSession
     * @package Ataccama\Eye\Env\Sessions
     * @property-read Person|null $user
     * @property-read string      $ipAddress
     */
    class MinifiedSession implements IEntry
    {
        use BaseEntry;

        /** @var string */
        protected $ipAddress;

        /**
         * MinifiedSession constructor.
         * @param string $id
         * @param string $ipAddress
         */
        public function __construct(string $id, string $ipAddress)
        {
            $this->id = $id;
            $this->ipAddress = $ipAddress;
        }

        /**
         * @return string
         */
        public function getIpAddress(): string
        {
            return $this->ipAddress;
        }
    }