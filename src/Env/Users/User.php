<?php

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\Name;
    use Nette\Utils\DateTime;


    /**
     * Class User
     * @package Ataccama\Eye\Env\Users
     */
    class User extends UserDefinition implements IEntry, IArray
    {
        use BaseEntry;

        /** @var DateTime */
        protected $dtCreated;

        /**
         * User constructor.
         * @param int         $id
         * @param DateTime    $dtCreated
         * @param Name        $name
         * @param Email       $email
         * @param string|null $ipAddress
         */
        public function __construct(int $id, DateTime $dtCreated, Name $name, Email $email, string $ipAddress = null)
        {
            parent::__construct($name, $email, $ipAddress);
            $this->id = $id;
            $this->dtCreated = $dtCreated;
        }

        /**
         * @return DateTime
         */
        public function getDtCreated(): DateTime
        {
            return $this->dtCreated;
        }

        public function toArray(): array
        {
            $array = parent::toArray();
            $array["id"] = $this->id;

            return $array;
        }
    }