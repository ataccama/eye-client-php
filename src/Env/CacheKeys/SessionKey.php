<?php

    namespace Ataccama\Eye\Client\Env\CacheKeys;

    use Ataccama\Common\Utils\Cache\EntryKey;


    /**
     * Class SessionKey
     * @package Ataccama\Eye\Client\Env\CacheKeys
     */
    class SessionKey extends EntryKey
    {
        public function getPrefix(): ?string
        {
            return "eye_api_session";
        }
    }