<?php

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\IArray;
    use Ataccama\Common\Env\Name;


    /**
     * Class UserDefinition
     * @package Ataccama\Eye\Env\Users
     */
    class UserDefinition implements IArray
    {
        use Person;

        /** @var string */
        public $keycloakId;

        /** @var string */
        public $industry;

        /** @var bool */
        public $acceptedTerms;

        /** @var bool */
        public $emailUpdates;

        /** @var string */
        public $ipAddress;

        /**
         * UserDefinition constructor.
         * @param Name   $name
         * @param Email  $email
         * @param string $ipAddress
         */
        public function __construct(Name $name, Email $email, string $ipAddress = null)
        {
            $this->name = $name;
            $this->email = $email;
            $this->ipAddress = $ipAddress;
        }

        public function toArray(): array
        {
            $array = [
                "name"      => $this->name->full,
                "email"     => $this->email->definition,
                "ipAddress" => $this->ipAddress
            ];

            $optionalFields = [
                "jobTitle",
                "phone",
                "country",
                "city",
                "organization",
                "keycloakId",
                "emailUpdates",
                "acceptedTerms",
                "industry"
            ];

            foreach ($optionalFields as $field) {
                if (isset($this->{$field})) {
                    $array[$field] = $this->{$field};
                }
            }

            if (isset($this->country)) {
                $array['country'] = $this->country;
            }

            return $array;
        }
    }