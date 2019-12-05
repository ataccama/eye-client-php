<?php

    namespace Ataccama\Eye\Client\Env\CacheKeys;

    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Exceptions\NotDefined;
    use Ataccama\Common\Utils\Cache\EntryKey;
    use Ataccama\Common\Utils\Cache\IKey;
    use Ataccama\Common\Utils\Cache\Key;
    use Ataccama\Eye\Client\Env\Users\User;


    /**
     * Class UserKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    class UserKey extends EntryKey
    {
        public function getPrefix(): ?string
        {
            return "eye_api_user";
        }

        /**
         * @param User $user
         * @return IKey
         * @throws NotDefined
         */
        public static function keycloakKey(User $user): IKey
        {
            if (!empty($user->keycloakId)) {
                return new Key($user->keycloakId, UserFilterKey::PREFIX);
            }

            throw new NotDefined("Key cannot be defined.");
        }

        /**
         * @param IEntry $session
         * @return IKey
         */
        public static function sessionKey(IEntry $session): IKey
        {
            return new Key($session->id, UserFilterKey::PREFIX);
        }

        /**
         * @param User $user
         * @return IKey
         */
        public static function emailKey(User $user): IKey
        {
            return new Key($user->email, UserFilterKey::PREFIX);
        }
    }