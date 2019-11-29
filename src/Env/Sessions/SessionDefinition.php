<?php

    namespace Ataccama\Eye\Client\Env\Sessions;

    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\DateTime;


    /**
     * Class SessionDefinition
     * @package Ataccama\Eye\Env\Activities
     */
    class SessionDefinition
    {
        /** @var IEntry */
        public $user;

        /** @var string */
        public $ipAddress;

        /** @var DateTime */
        public $dtExpired;

        /**
         * SessionDefinition constructor.
         * @param IEntry $user
         * @param string $ipAddress
         */
        public function __construct(string $ipAddress, IEntry $user = null)
        {
            $this->user = $user;
            $this->ipAddress = $ipAddress;
            $this->dtExpired = DateTime::from("+1 year");
        }
    }