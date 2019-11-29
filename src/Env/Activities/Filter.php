<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Exceptions\NotDefined;
    use Nette\Utils\DateTime;
    use Nette\Utils\Validators;


    /**
     * Class ActivityFilter
     * @package Ataccama\Eye\Env\Activities
     */
    class Filter
    {
        const EMAIL = "email";
        const IP_ADDRESS = "ip_address";
        const CONTINENTS = "continents";

        /** @var Email|null */
        public $email;

        /** @var string|null */
        public $ipAddress;

        /** @var int[] */
        public $typeIds;

        /** @var string[] */
        public $continents;

        /** @var DateTime */
        public $dtFrom;

        /** @var DateTime */
        public $dtTo;

        /**
         * ActivityFilter constructor.
         * @param DateTime $from
         * @param DateTime $to
         * @param int[]    $activityTypeIds
         * @param array    $options
         * @throws NotDefined
         */
        public function __construct(DateTime $from, DateTime $to, array $activityTypeIds, array $options = [])
        {
            $this->dtFrom = $from;
            $this->dtTo = $to;

            // optional
            if (isset($options[self::EMAIL]) && $options[self::EMAIL] instanceof Email) {
                $this->email = $options[self::EMAIL];
            } elseif (!empty($options[self::EMAIL])) {
                $this->email = new Email($options[self::EMAIL]);
            }
            if (isset($options[self::IP_ADDRESS]) && !empty($options[self::IP_ADDRESS])) {
                $this->ipAddress = $options[self::IP_ADDRESS];
            }
            if (!empty($activityTypeIds)) {
                foreach ($activityTypeIds as $typeId) {
                    if (Validators::isNumericInt($typeId)) {
                        $this->typeIds[] = $typeId;
                    }
                }
            } else {
                throw new NotDefined("Activity Type IDs MUST be set.");
            }
            if (isset($options[self::CONTINENTS]) && is_array($options[self::CONTINENTS])) {
                $this->continents[] = $options[self::CONTINENTS];
            }
        }
    }