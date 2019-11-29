<?php

    namespace Ataccama\Eye\Client\Env\Sessions;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Eye\Client\Env\Activities\ActivityList;
    use Nette\Utils\DateTime;


    /**
     * Class Session
     * @package Ataccama\Eye\Env\Activities
     * @property-read DateTime $dtCreated
     */
    class Session extends SessionDefinition implements IEntry, IArray
    {
        use BaseEntry;

        /** @var DateTime */
        protected $dtCreated;

        /** @var ActivityList */
        public $activities;

        /**
         * Session constructor.
         * @param string      $id
         * @param DateTime    $dtCreated
         * @param DateTime    $dtExpired
         * @param string      $ipAddress
         * @param IEntry|null $user
         */
        public function __construct(
            string $id,
            DateTime $dtCreated,
            DateTime $dtExpired,
            string $ipAddress,
            IEntry $user = null
        ) {
            parent::__construct($ipAddress, $user);
            $this->dtCreated = $dtCreated;
            $this->id = $id;
            $this->dtExpired = $dtExpired;
            $this->activities = new ActivityList();
        }

        public function toArray(): array
        {
            return [
                "id"         => $this->id,
                "dtCreated"  => $this->dtCreated->getTimestamp(),
                "activities" => $this->activities->toArray()
            ];
        }

        public function toApiArray(): array
        {
            return [
                "id"         => $this->id,
                "dtCreated"  => $this->dtCreated->getTimestamp(),
                "activities" => $this->activities->toApiArray()
            ];
        }
    }