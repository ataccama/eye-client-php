<?php

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Name;
    use Nette\Utils\DateTime;


    /**
     * Trait Person
     * @package Ataccama\Eye\Env\Users
     */
    trait Person
    {
        /** @var Name */
        public $name;

        /** @var Email */
        public $email;

        /** @var string */
        public $organization;

        /** @var string */
        public $jobTitle;

        /** @var string */
        public $country;

//        /** @var string */
//        public $state;

        /** @var string */
        public $city;

//        /** @var string */
//        public $street;
//
//        /** @var string */
//        public $zipcode;

        /** @var string */
        public $phone;

//        /** @var DateTime */
//        public $dtModified;
    }