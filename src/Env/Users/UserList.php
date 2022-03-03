<?php

    namespace Ataccama\Eye\Client\Env\Users;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class UserList
     * @package Ataccama\Eye\Env\Users
     */
    class UserList extends BaseArray
    {
        /**
         * @param User $user
         */
        public function add($user)
        {
            $this->items[$user->id] = $user;
        }

        /**
         * @return User|null
         */
        public function current(): ?User
        {
            return parent::current();
        }
    }