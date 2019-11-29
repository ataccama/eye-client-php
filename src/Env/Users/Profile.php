<?php

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Name;
    use Ataccama\Eye\Client\Env\Support\Type;
    use Ataccama\Eye\Client\Env\Products\AccessList;
    use Ataccama\Eye\Env\Sessions\MinifiedSessionList;
    use Nette\Utils\DateTime;


    /**
     * Class Profile
     * @package Ataccama\Eye\Env\User
     */
    class Profile extends User
    {
        /** @var MinifiedSessionList */
        public $sessions;

        /** @var AccessList */
        public $documentation;

        /** @var Type */
        public $support;

        /**
         * User constructor.
         * @param int      $id
         * @param DateTime $dtCreated
         * @param Name     $name
         * @param Email    $email
         * @param string   $ipAddress
         */
        public function __construct(int $id, DateTime $dtCreated, Name $name, Email $email, string $ipAddress = null)
        {
            parent::__construct($id, $dtCreated, $name, $email, $ipAddress);
            $this->id = $id;
            $this->dtCreated = $dtCreated;
            $this->sessions = new MinifiedSessionList();
            $this->support = Type::none();
            $this->documentation = new AccessList();
        }

        /**
         * @param User $user
         * @return Profile
         */
        public static function create(User $user): Profile
        {
            $profile = new Profile($user->id, $user->dtCreated, $user->name, $user->email, $user->ipAddress);
            $profile->industry = $user->industry;
            $profile->keycloakId = $user->keycloakId;
            $profile->emailUpdates = $user->emailUpdates;
            $profile->acceptedTerms = $user->acceptedTerms;
//            $profile->dtModified = $user->dtModified;
            $profile->phone = $user->phone;
//            $profile->zipcode = $user->zipcode;
//            $profile->street = $user->street;
//            $profile->state = $user->state;
            $profile->city = $user->city;
            $profile->country = $user->country;
            $profile->organization = $user->organization;
            $profile->jobTitle = $user->jobTitle;

            return $profile;
        }

        public function toArray(): array
        {
            $profile = parent::toArray();
            $profile['keycloakId'] = $this->keycloakId;
            $profile['organization'] = $this->organization;
            $profile['jobTitle'] = $this->jobTitle;
            $profile['phone'] = $this->phone;

            return $profile;
        }
    }