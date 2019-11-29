<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Utils\Comparator\Comparable;
    use Nette\Utils\DateTime;


    /**
     * Class Activity
     * @package Ataccama\Eye\Env\Activities
     * @property-read DateTime $dtCreated
     */
    class Activity extends ActivityDefinition implements IEntry, Comparable, IArray
    {
        use BaseEntry;

        /** @var DateTime */
        protected $dtCreated;

        /** @var MetadataList */
        public $metadata;

        /** @var string */
        public $countryCode;

        /** @var IEntry */
        public $user;

        /**
         * Activity constructor.
         * @param int      $id
         * @param DateTime $dtCreated
         * @param IEntry   $session
         * @param Type     $type
         * @param string   $ipAddress
         */
        public function __construct(int $id, DateTime $dtCreated, IEntry $session, Type $type, string $ipAddress = null)
        {
            parent::__construct($session, $type, $ipAddress);
            $this->id = $id;
            $this->dtCreated = $dtCreated;
            $this->metadata = new MetadataList();
        }

        /**
         * @return DateTime
         */
        public function getDtCreated(): DateTime
        {
            return $this->dtCreated;
        }

        public function getValue(): int
        {
            return $this->dtCreated->getTimestamp();
        }

        public function toArray(): array
        {
            return [
                "id"          => $this->id,
                "dtCreated"   => $this->dtCreated->getTimestamp(),
                "countryCode" => $this->countryCode,
                "type"        => $this->type->toArray(),
                "ipAddress"   => $this->ipAddress,
                "tags"        => $this->tags->toArray(),
                "metadata"    => $this->metadata->toArray()
            ];
        }
    }