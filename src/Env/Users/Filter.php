<?php

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\Email;
    use Ataccama\Common\Env\Entry;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Exceptions\NotDefined;
    use Nette\InvalidArgumentException;
    use Nette\Utils\Validators;


    /**
     * Class Filter
     * @package Ataccama\Eye\Client\Env\Users
     */
    class Filter
    {
        const EMAIL = "email";
        const KEYCLOAK_ID = "keycloak_id";
        const ID = "user_id";
        const SESSION = "session_id";

        /** @var Email|null */
        public $email;

        /** @var int|null */
        public $id;

        /** @var IEntry|null */
        public $session;

        /** @var string|null */
        public $keycloakId;

        /**
         * Filter constructor.
         * @param array $params
         * @throws NotDefined
         */
        public function __construct(array $params)
        {
            $defined = false;

            // email
            if (isset($params[self::EMAIL])) {
                if ($params[self::EMAIL] instanceof Email) {
                    $this->email = $params[self::EMAIL];
                } elseif (Validators::isEmail($params[self::EMAIL])) {
                    $this->email = new Email($params[self::EMAIL]);
                } else {
                    throw new InvalidArgumentException("Invalid parameter EMAIL. Must be valid an e-mail address or an object of the class Email.");
                }
                $defined = true;
            }

            // id
            if (isset($params[self::ID])) {
                if (Validators::isNumericInt($params[self::ID])) {
                    $this->id = $params[self::ID];
                } else {
                    throw new InvalidArgumentException("Invalid parameter ID. Must be an integer.");
                }
                $defined = true;
            }

            // id
            if (isset($params[self::KEYCLOAK_ID])) {
                if (!empty(self::KEYCLOAK_ID)) {
                    $this->keycloakId = $params[self::KEYCLOAK_ID];
                } else {
                    throw new InvalidArgumentException("Invalid parameter KEYCLOAK_ID. Must be a string.");
                }
                $defined = true;
            }

            // session
            if (isset($params[self::SESSION])) {
                if ($params[self::SESSION] instanceof IEntry) {
                    $this->session = $params[self::SESSION];
                } elseif (!empty(self::SESSION)) {
                    $this->session = new Entry($params[self::SESSION]);
                } else {
                    throw new InvalidArgumentException("Invalid parameter SESSION. Must be valid an object of the interface IEntry.");
                }
                $defined = true;
            }

            if (!$defined) {
                throw new NotDefined("At least one parameter must be set.");
            }
        }
    }