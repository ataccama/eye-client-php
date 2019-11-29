<?php

    namespace Ataccama\Eye\Client\Env\Products;

    use Ataccama\Common\Env\BaseArray;


    /**
     * Class ProductAccessList
     * @package Ataccama\Eye\Env\Products
     */
    class AccessList extends BaseArray
    {
        /**
         * @param ProductAccess $access
         */
        public function add($access)
        {
            parent::add($access);
        }

        /**
         * @return ProductAccess
         */
        public function current(): ProductAccess
        {
            return parent::current();
        }
    }